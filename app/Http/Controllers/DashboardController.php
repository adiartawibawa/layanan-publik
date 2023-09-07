<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $data = [];

    public function dashboard()
    {
        // $this->data['permohonans'] = Auth::user()->permohonans;

        $permohonans = Permohonan::select('permohonan.*', 'layanan.name as layanan_name', 'status_permohonan.aktivitas as status_aktivitas')
            ->leftJoin('layanan', 'permohonan.layanan_id', '=', 'layanan.id')
            ->leftJoin(DB::raw('(SELECT permohonan_id, MAX(created_at) AS max_created_at FROM status_permohonan GROUP BY permohonan_id) latest_status'), function ($join) {
                $join->on('permohonan.id', '=', 'latest_status.permohonan_id');
            })
            ->leftJoin('status_permohonan', function ($join) {
                $join->on('latest_status.permohonan_id', '=', 'status_permohonan.permohonan_id')
                    ->on('latest_status.max_created_at', '=', 'status_permohonan.created_at');
            })
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        $this->data['permohonans'] = $permohonans;

        // $this->data['permohonans'] = Permohonan::where('user_id', '=', Auth::user()->id)->with('layanan', 'statuses')->get();

        return view('dashboard', $this->data);
    }
}
