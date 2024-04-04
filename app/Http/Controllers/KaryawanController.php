<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakaryawan;
use App\Models\LogActivity;
use Auth;

class KaryawanController extends Controller
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
        $data_karyawan = Datakaryawan::when($isFiltered, function ($query) use ($cari, $filter) {
            $query->where($filter, 'like', '%'.$cari.'%');
        })->get();
        $jabatan = Datakaryawan::pluck('position')->unique();
        $golongan = Datakaryawan::pluck('golongan')->unique();

        return view('karyawan.master', compact('data_karyawan', 'jabatan', 'golongan'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'no_pers' => 'required',
            'position' => 'required',
            'golongan' => 'required'
        ]);
        $cekPers = Datakaryawan::where('no_pers',$request->no_pers)->exists();
        if (!$cekPers) 
        {
            $createData = Datakaryawan::create([
                'personnel_number' => $request->nama_lengkap,
                'no_pers' => $request->no_pers,
                'position' => $request->position,
                'golongan' => $request->golongan
            ]);
            if ($createData) 
            {
                LogActivity::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Menambahkan Karyawan dengan [no_pers '.$request->no_pers.']',
                    'ip' => session()->get('ip_address')
                ]);
                return back()->with(['success' => 'Berhasil tambah pegawai!']);
            }
            else 
            {
                return back()->with(['error' => 'Gagal tambah pegawai!']);
            }
        }
        else 
        {
            return back()->with(['warning' => 'Nomor Personnel nya sudah ada!']);
        }
    }

    public function destroy($pers)
    {
        $deleteData = Datakaryawan::where('no_pers', $pers)->delete();
        if ($deleteData) 
        {
            LogActivity::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Menghapus Data Karyawan [no_pers '.$request->no_pers.']',
                'ip' => session()->get('ip_address')
            ]);
            return back()->with(['success' => 'Berhasil menghapus pegawai!']);
        }
    }

    public function update($pers, Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'no_pers' => 'required',
            'position' => 'required',
            'golongan' => 'required'
        ]);
        $cekPers = Datakaryawan::where('no_pers',$request->no_pers)->exists();
        if ($cekPers) 
        {
            $cekPers = Datakaryawan::where('no_pers',$request->no_pers)->update([
                'personnel_number' => $request->nama_lengkap,
                'no_pers' => $request->no_pers,
                'position' => $request->position,
                'golongan' => $request->golongan
            ]);
            if ($cekPers) 
            {
                LogActivity::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Merubah Data Karyawan [no_pers '.$request->no_pers.']',
                    'ip' => session()->get('ip_address')
                ]);
                return back()->with(['success' => 'Berhasil merubah pegawai!']);
            }
        }
        else
        {
            return back()->with(['error' => 'Pegawai tidak ditemukan!']);
        }
    }
}
