<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\Layanan;
class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $title = 'Layanan - Drg. Uciria Halim';
        return view('admin.layanan.list',compact('layanan','title'));
    }

    public function tambah(Request $request)
    {
        $rules = [
            'layanan'          => 'required',
            'harga'      => 'required',
        ];
 
        $messages = [
            'layanan.required'          => 'layanan wajib diisi.',
            'harga.required'          => 'Harga Wajib diisi.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        

          $input = Layanan::create($request->all());
          return back()->with('success', 'Sukses Menambahkan Layanan');
    }
    public function update(Request $request,$id)
    {
        $id = $id;
        $layanan = \App\Models\Layanan::find($id);
        $layanan->update($request->all());
        $layanan->save();
        return Redirect::back()->with('success','Data Berhasil diUpdate');
        
    }
    public function delete($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return back()->with('success', 'Sukses Menghapus Layanan');
    }
}
