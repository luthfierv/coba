<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relawan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $counts = [
            'total' => Relawan::query()->count(),
            'pending' => Relawan::query()->where('status', 'pending')->count(),
            'approved' => Relawan::query()->where('status', 'approved')->count(),
            'rejected' => Relawan::query()->where('status', 'rejected')->count(),
        ];

        $latestRelawans = Relawan::query()
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('counts', 'latestRelawans'));
    }
}
