<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RelawanStatusLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    public function index(Request $request): View
    {
        $allowedActions = [
            'approve',
            'reject',
            'nonaktifkan',
            'publish_contact',
            'hide_contact',
        ];

        $actionFilter = $request->string('action')->toString();
        $relawanFilter = trim($request->string('relawan')->toString());
        $adminFilter = trim($request->string('admin')->toString());

        $logs = RelawanStatusLog::query()
            ->with([
                'relawan:id,nama,nik',
                'adminUser:id,name,email',
            ])
            ->when(in_array($actionFilter, $allowedActions, true), function ($query) use ($actionFilter): void {
                $query->where('action', $actionFilter);
            })
            ->when($relawanFilter !== '', function ($query) use ($relawanFilter): void {
                $query->whereHas('relawan', function ($relawanQuery) use ($relawanFilter): void {
                    $relawanQuery
                        ->where('nama', 'like', "%{$relawanFilter}%")
                        ->orWhere('nik', 'like', "%{$relawanFilter}%");
                });
            })
            ->when($adminFilter !== '', function ($query) use ($adminFilter): void {
                $query->whereHas('adminUser', function ($adminQuery) use ($adminFilter): void {
                    $adminQuery
                        ->where('name', 'like', "%{$adminFilter}%")
                        ->orWhere('email', 'like', "%{$adminFilter}%");
                });
            })
            ->latest('changed_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.logs.index', [
            'logs' => $logs,
            'allowedActions' => $allowedActions,
            'actionFilter' => $actionFilter,
            'relawanFilter' => $relawanFilter,
            'adminFilter' => $adminFilter,
        ]);
    }
}
