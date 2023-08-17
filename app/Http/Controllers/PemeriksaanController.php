<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Layanan;
use Carbon\Carbon;
use App\Models\Rekam;
use App\Models\Detail;

class PemeriksaanController extends Controller
{
     //
     public function index()
     {

          $pasien = Pasien::all();
          $layanan = Layanan::all();
          $obat = Obat::all();
          $title = 'Pemeriksaan';
          if (Session::get('level') == 'Dokter' || Session::get('level') == 'Resepsionis') {
               $pemeriksaan = Rekam::all();
          } else {
               $id = Session::get('id');
               $pemeriksaan = Rekam::where('pasien_id', $id)->get();
          }

          return view('admin.pemeriksaan.list', compact('pemeriksaan', 'title', 'pasien', 'layanan', 'obat'));
     }
     public function store(Request $request)
     {
          $id = $request->pasien_id;

          $pas = Pasien::find($id);

          $tgl = Carbon::now();
          $cari  = $tgl->toDateString();

          $input = new Rekam();
          $input->pasien_id = $id;
          $input->nama_pasien = $pas->nama;
          $input->keluhan = $request->keluhan;

          $input->tgl_rekam = $cari;

          $input->save();

          return Redirect::back();
     }
     public function detail(Request $request)
     {
          

          $input = $request->all();

          $id1 = $request->input('layanan_id');

          $id2 = $request->input('obat_id');

          $id3 = $request->rekam_id;
          $diag = $request->diagnosa;
          $resep = $request->resep;

          if ($id2 != null) {
               $harga1 = 0;
               foreach ($id1 as $layanan) {
                    $cari1 = Layanan::find($layanan);
                    $harga1 = $harga1 + $cari1->harga;
               }
          } else {
               $harga1 = 0;
          }

          if ($id1 != null) {
               $harga2 = 0;

               foreach ($id2 as $obat) {
                    $cari2 = Obat::find($obat);
                    $harga2 = $harga2 + $cari2->harga;
               }
          } else {
               $harga2 = 0;
          }

          $subtotal = $harga1 + $harga2;

          $final1 =  implode(',', $id1);
          $final2 =  implode(',', $id2);

          $det = new Detail();
          $det->rekam_id = $id3;
          $det->obat_id = $final2;
          $det->layanan_id = $final1;
          $det->diagnosa = $diag;
          $det->resep = $resep;
          $det->total_biaya = $subtotal;
          $det->save();

          return Redirect::back();
     }
     public function done($id)
     {
          $periksa = Rekam::find($id);
          $periksa->status = "Selesai";
          $periksa->save();

          return Redirect::back();
     }
}
