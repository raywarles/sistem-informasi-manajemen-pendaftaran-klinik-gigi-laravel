<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\Pasien;
class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        $title = 'pasien - Drg. Uciria Halim';
        return view('admin.pasien.list',compact('pasien','title'));
    }

    public function tambah(Request $request)
    {
        $rules = [
            'nama'          => 'required',
            'password'      => 'required|min:5',

            'username'         => 'required|unique:pasiens'
        ];
 
        $messages = [
            'nama.required'          => 'Nama wajib diisi.',
            
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'username.required'         => 'username wajib diisi.',
            'username.unique'           => 'username sudah terdaftar.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


          $pasiens = new Pasien;
          $pasiens->level = 'Pasien';
          $pasiens->status = '1';
          $pasiens->username = $request->username;
          $pasiens->password = bcrypt($request->password);
          $pasiens->nama = $request->nama;
          $pasiens->alamat = $request->alamat;
          $pasiens->nope = $request->nope;
          $pasiens->tgl_lahir = $request->tgl_lahir;
          $pasiens->jk = $request->jk;
          $pasiens->save();
          return back()->with('success', 'Pendaftaran Berhasil');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $pasiens = \App\Models\Pasien::find($id);
        $pasiens->update($request->all());
        $pasiens->save();
          return Redirect::back()->with('success','Data Berhasil diUpdate');
        
    }
    public function delete($id)
    {
        $pasiens = Pasien::findOrFail($id);
        $pasiens->delete();
        return back()->with('success', 'Sukses Menghapus pasiens');
    }
}
