<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relawan;
use App\Models\RelawanFile;
use App\Models\RelawanStatusLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RelawanVerificationController extends Controller
{
    public function index(Request $request): View
    {
        $allowedStatuses = ['pending', 'approved', 'rejected'];
        $statusFilter = $request->string('status')->toString();

        $relawans = Relawan::query()
            ->withCount('files')
            ->when(in_array($statusFilter, $allowedStatuses, true), function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.relawans.index', [
            'relawans' => $relawans,
            'statusFilter' => $statusFilter,
        ]);
    }

    public function show(Relawan $relawan): View
    {
        $relawan->load([
            'files' => fn ($query) => $query->latest(),
            'statusLogs' => fn ($query) => $query->with('adminUser')->latest('changed_at'),
        ]);

        return view('admin.relawans.show', compact('relawan'));
    }

    public function approve(Relawan $relawan): RedirectResponse
    {
        $before = $this->snapshot($relawan);

        $relawan->update([
            'status' => 'approved',
            'tanggal_disetujui' => now(),
            'is_active' => true,
            'is_public_contact' => true,
        ]);
        $this->logStatusChange($relawan, 'approve', $before);

        return redirect()
            ->route('admin.relawans.show', $relawan)
            ->with('success', 'Relawan berhasil di-approve.');
    }

    public function reject(Relawan $relawan): RedirectResponse
    {
        $before = $this->snapshot($relawan);

        $relawan->update([
            'status' => 'rejected',
            'tanggal_disetujui' => null,
            'is_active' => false,
        ]);
        $this->logStatusChange($relawan, 'reject', $before);

        return redirect()
            ->route('admin.relawans.show', $relawan)
            ->with('success', 'Relawan berhasil di-reject.');
    }

    public function nonaktifkan(Relawan $relawan): RedirectResponse
    {
        $before = $this->snapshot($relawan);

        $relawan->update([
            'is_active' => false,
        ]);
        $this->logStatusChange($relawan, 'nonaktifkan', $before);

        return redirect()
            ->route('admin.relawans.show', $relawan)
            ->with('success', 'Relawan berhasil dinonaktifkan.');
    }

    public function publishContact(Relawan $relawan): RedirectResponse
    {
        if ($relawan->status !== 'approved' || ! $relawan->is_active) {
            return redirect()
                ->route('admin.relawans.show', $relawan)
                ->withErrors([
                    'status' => 'Kontak publik hanya dapat diaktifkan untuk relawan approved dan aktif.',
                ]);
        }

        $before = $this->snapshot($relawan);
        $relawan->update(['is_public_contact' => true]);
        $this->logStatusChange($relawan, 'publish_contact', $before);

        return redirect()
            ->route('admin.relawans.show', $relawan)
            ->with('success', 'Kontak relawan berhasil dipublikasikan.');
    }

    public function hideContact(Relawan $relawan): RedirectResponse
    {
        $before = $this->snapshot($relawan);
        $relawan->update(['is_public_contact' => false]);
        $this->logStatusChange($relawan, 'hide_contact', $before);

        return redirect()
            ->route('admin.relawans.show', $relawan)
            ->with('success', 'Kontak relawan disembunyikan dari publik.');
    }

    public function downloadFile(Relawan $relawan, RelawanFile $relawanFile): BinaryFileResponse
    {
        abort_unless($relawanFile->relawan_id === $relawan->id, 404);

        return Storage::download($relawanFile->file_path, $relawanFile->file_name);
    }

    private function snapshot(Relawan $relawan): array
    {
        return [
            'status' => $relawan->status,
            'is_active' => $relawan->is_active,
            'is_public_contact' => $relawan->is_public_contact,
        ];
    }

    private function logStatusChange(Relawan $relawan, string $action, array $before, ?string $note = null): void
    {
        RelawanStatusLog::query()->create([
            'relawan_id' => $relawan->id,
            'admin_user_id' => auth()->id(),
            'action' => $action,
            'old_status' => $before['status'],
            'new_status' => $relawan->status,
            'old_is_active' => $before['is_active'],
            'new_is_active' => $relawan->is_active,
            'old_is_public_contact' => $before['is_public_contact'],
            'new_is_public_contact' => $relawan->is_public_contact,
            'note' => $note,
            'changed_at' => now(),
        ]);
    }
}
