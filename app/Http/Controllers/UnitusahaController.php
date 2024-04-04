<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unitusaha;
use App\Models\LogActivity;

class UnitusahaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $filter = $request->by;
        $isFiltered = $cari !== null && $filter !== null;
        if ($isFiltered) {
            LogActivity::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Mencari ['.$filter.'] ['.$cari.']',
                'ip' => session()->get('ip_address')
            ]);
        }
        $unit = Unitusaha::when($isFiltered, function ($query) use ($cari, $filter) {
            $query->where($filter, 'like', '%'.$cari.'%');
        })->get();
        $jabatan = Unitusaha::pluck('kode_unit')->unique();
        $golongan = Unitusaha::pluck('nama_unit')->unique();
        return view('unit_usaha.master', compact('unit'));
    }
}
