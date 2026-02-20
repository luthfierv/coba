<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRelawanRequest;
use App\Models\Relawan;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RelawanRegistrationController extends Controller
{
    public function create(): View
    {
        return view('public.relawan.create');
    }

    public function store(StoreRelawanRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $files = $request->file('dokumen', []);
        $relawan = null;

        DB::transaction(function () use (&$relawan, $validated, $files): void {
            $relawan = Relawan::query()->create(array_merge(
                Arr::except($validated, ['dokumen']),
                ['status' => 'pending']
            ));

            foreach ($files as $file) {
                $relawan->files()->create([
                    'file_path' => $file->store('relawan-files'),
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        });

        return redirect()
            ->route('relawan.create')
            ->with('success', "Pendaftaran berhasil dikirim. ID pendaftaran: {$relawan->id}. Status awal: pending.");
    }
}
