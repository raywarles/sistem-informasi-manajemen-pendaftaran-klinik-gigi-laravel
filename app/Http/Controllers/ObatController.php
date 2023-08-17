<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\Obat;
class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        $title = 'Daftar Obat - Drg. Uciria Halim';
        return view('admin.obat.list',compact('obat','title'));
    }

    public function tambah(Request $request)
    {
        $rules = [
            'nama_obat'          => 'required',
            'harga'      => 'required',
        ];
 
        $messages = [
            'nama_obat.required'          => 'obat wajib diisi.',
            'harga.required'          => 'Harga Wajib diisi.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        

          $input = Obat::create($request->all());
          return back()->with('success', 'Sukses Menambahkan obat');
    }
    public function update(Request $request,$id)
    {
        $id = $id;
        $obat = \App\Models\Obat::find($id);
        $obat->update($request->all());
        $obat->save();
        return Redirect::back()->with('success','Data Berhasil diUpdate');
        
    }
    public function delete($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return back()->with('success', 'Sukses Menghapus obat');
    }
}
