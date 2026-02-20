<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Relawan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_relawan' => Relawan::query()->count(),
            'approved_relawan' => Relawan::query()
                ->where('status', 'approved')
                ->count(),
        ];

        $latestArtikels = Artikel::query()
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', compact('stats', 'latestArtikels'));
    }

    public function artikel(): View
    {
        $artikels = Artikel::query()
            ->published()
            ->latest('published_at')
            ->paginate(9);

        return view('public.artikel.index', compact('artikels'));
    }

    public function showArtikel(string $slug): View
    {
        $artikel = Artikel::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArtikels = Artikel::query()
            ->published()
            ->where('id', '!=', $artikel->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.artikel.show', compact('artikel', 'relatedArtikels'));
    }

    public function statusRelawan(): View
    {
        return view('public.status-relawan', [
            'result' => null,
            'searched' => false,
            'input' => [
                'nik' => null,
                'email' => null,
            ],
        ]);
    }

    public function checkStatusRelawan(Request $request): View
    {
        $validated = $request->validate([
            'nik' => ['nullable', 'digits:16', 'required_without:email'],
            'email' => ['nullable', 'email', 'required_without:nik'],
        ]);

        $nik = $validated['nik'] ?? null;
        $email = $validated['email'] ?? null;

        $query = Relawan::query();

        if ($nik !== null && $email !== null) {
            $query->where(function ($builder) use ($nik, $email): void {
                $builder->where('nik', $nik)->orWhere('email', $email);
            });
        } elseif ($nik !== null) {
            $query->where('nik', $nik);
        } else {
            $query->where('email', $email);
        }

        $result = $query->first();

        return view('public.status-relawan', [
            'result' => $result,
            'searched' => true,
            'input' => [
                'nik' => $nik,
                'email' => $email,
            ],
        ]);
    }

    public function kontakRelawan(): View
    {
        $relawans = Relawan::query()
            ->where('status', 'approved')
            ->where('is_active', true)
            ->where('is_public_contact', true)
            ->latest('tanggal_disetujui')
            ->get()
            ->map(function (Relawan $relawan): Relawan {
                $relawan->setAttribute('masked_no_hp', $this->maskPhone($relawan->no_hp));

                return $relawan;
            });

        return view('public.kontak-relawan', ['relawans' => $relawans]);
    }

    private function maskPhone(?string $phoneNumber): string
    {
        if ($phoneNumber === null || $phoneNumber === '') {
            return '-';
        }

        $digits = preg_replace('/\D+/', '', $phoneNumber) ?? '';
        $length = strlen($digits);

        if ($length <= 7) {
            return substr($digits, 0, 2).'***'.substr($digits, -2);
        }

        return substr($digits, 0, 4).str_repeat('*', $length - 7).substr($digits, -3);
    }
}
