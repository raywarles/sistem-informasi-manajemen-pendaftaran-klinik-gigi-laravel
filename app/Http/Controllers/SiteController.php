<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use Carbon\Carbon; 
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Layanan;
use App\Models\Rekam;
use App\Models\User;
use App\Models\Jadwal;
use PDF;

class SiteController extends Controller
{
    public function index()
    {
        $title = 'Drg. Uciria Halim';
        $jadwal = Jadwal::all();
       return view('isi.home',compact('title','jadwal'));
    }

    public function dashboard()
    {
         $tgl = Carbon::now();
        $cari  = $tgl->toDateString();
        $data1 = Pasien::all();
        $jml1 = count($data1);
         $data2 = Obat::all();
        $jml2 = count($data2);
         $data3 = Layanan::all();
        $jml3 = count($data3);
        $data4 = Antrian::where('tanggal',$cari)->get();
        $jml4 = count($data4);

       
        $antri = Antrian::where('tanggal',$cari)->get();
        $title = 'Dashboard - Drg. Uciria Halim';
        if (Session::get('level') == 'Admin' || Session::get('level') == 'Resepsionis' || Session::get('level') == 'Dokter') {
            return view('admin.dashboard.list',compact('title','antri','jml1','jml2','jml3','jml4'));
        }
        elseif(Session::get('level') == 'Pasien'){
            $id = Session::get('id');
            $data = Pasien::find($id);
            return view('admin.dashboard.pasien',compact('title','data'));
        }
        
        
    }
    public function createKartu() {
      // retreive all records from db
        $id = Session::get('id');

      $data = Pasien::find($id);

      // share data to view
  
      $pdf = PDF::loadView('admin.pasien.kartu', compact('data'));
      // download PDF file with download method
      return $pdf->download('Kartu_Pasien.pdf');
    }
     public function createRekap() {
      // retreive all records from db
     ;

      $data = Rekam::all();

      // share data to view
  
      $pdf = PDF::loadView('admin.pemeriksaan.rekap', compact('data'));
      // download PDF file with download method
      return $pdf->download('Rekap_Pemeriksaan.pdf');
    }

    public function login(Request $request)
    {
        $usname = $request->username;
        $pass = $request->password;

        $data = User::where('username',$usname)->first();
        $data2 = Pasien::where('username',$usname)->first();
        
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($pass , $data->password)){
                Session::put('id'   ,$data->id);
                Session::put('login',TRUE);
                Session::put('level',$data->level);
                Session::put('avatar',$data->avatar);
                Session::put('nama',$data->nama);
                return redirect('/dashboard');
            }
            
            else{
                return redirect('/')->with('alert','Informasi Login yang diinputkan Salah');
            }
        
        }
        elseif ($data2) {
           
            if(Hash::check($pass , $data2->password)){
                Session::put('id',$data2->id);
                Session::put('login',TRUE);
                Session::put('level',$data2->level);
                Session::put('nama',$data2->nama);
                return redirect('/dashboard');
            }
            
            else{
                return redirect('/')->with('alert','Informasi Login yang diinputkan Salah');
            }
        }
        
        else{
            return Redirect::back()->with('alert','Informasi Login yang diinputkan Salah');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}


