<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Jadwal;

class AntrianController extends Controller
{
    //
    public function index()
    {
        $antrian = Antrian::where('status', "!=", 'Selesai')->orderBy('tanggal')->get();
        $title = 'Antrian - Drg. Uciria Halim';
        return view('admin.antrian.list', compact('antrian', 'title'));
    }
    public function set(Request $request)
    {
        $id = $request->id;
        $sta = $request->status;

        $data = Antrian::find($id);
        $data->status = $sta;
        $data->save();
        return Redirect::back();
    }
    public function ambil(Request $request)
    {
        $usname = $request->nama;
        $tanggal = $request->tanggal;


        $cek = Antrian::where('tanggal', $tanggal)->get();
        if ($cek) {
            $jmlh = count($cek);
            $no_antrian = $jmlh + 1;
        } else {
            $no_antrian = 1;
        }

        $pas = Pasien::where('username', $usname)->first();
        $input = new Antrian();
        if ($pas) {
            $input->pasien_id = $pas->id;
            $input->nama = $pas->nama;
            $input->no_antrian = $no_antrian;
            $input->status = 'Ditampilkan';
            $input->tanggal = $tanggal;
            $input->save();
            return Redirect::back()->with('message', "Bapak/Ibuk " . $usname . " Nomor Antrian Anda Adalah: " . $no_antrian);
        } else {

            return Redirect::back()->with('message', "Username Tidak Ditemukan, Silahkan Registrasi Terlebih Dahulu");
        }
    }

    public function indexJadwal()
    {
        $jadwal = Jadwal::all();
        $title = 'jadwal - Drg. Uciria Halim';
        return view('admin.jadwal.list', compact('jadwal', 'title'));
    }

    public function tambahJadwal(Request $request)
    {
        $rules = [
            'tanggal'          => 'required',
            'kuota'      => 'required',
        ];

        $messages = [
            'tanggal.required'          => 'Tanggal wajib diisi.',
            'kuota.required'          => 'Kuota Wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $input = Jadwal::create($request->all());
        return back()->with('success', 'Sukses Menambahkan jadwal');
    }
    public function updateJadwal(Request $request, $id)
    {
        $id = $id;
        $jadwal = \App\Models\Jadwal::find($id);
        $jadwal->update($request->all());
        $jadwal->save();
        return Redirect::back()->with('success', 'Data Berhasil diUpdate');
    }
    public function deleteJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return back()->with('success', 'Sukses Menghapus jadwal');
    }
}
