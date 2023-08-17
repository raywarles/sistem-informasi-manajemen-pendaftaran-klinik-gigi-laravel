<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;
use Redirect;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $title = 'User - Drg. Uciria Halim';
        return view('admin.user.list',compact('user','title'));
    }

    public function tambah(Request $request)
    {
        $rules = [
            'nama'          => 'required',
            'password'      => 'required|min:5',

            'avatar1'      => 'required|mimes:jpg,jpeg,png|max:2048',
            'username'         => 'required|unique:users'
        ];
 
        $messages = [
            'nama.required'          => 'Nama wajib diisi.',
            'avatar1.required'          => 'Pilih Foto Profil.',
            'avatar1.mimes'          => 'Hanya Gunakan File dengan Tipe JPG,JPEG dan PNG.',
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'username.required'         => 'Username wajib diisi.',
            'username.unique'           => 'Username sudah terdaftar.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $file = $request->file('avatar1');
        // Mendapatkan Nama File
          $nama_file = $file->getClientOriginalName();  
          // Mendapatkan Extension File
          $extension = $file->getClientOriginalExtension();
          // Mendapatkan Ukuran File
          $ukuran_file = $file->getSize();
          // Proses Upload File
          $destinationPath = 'assets/img/avatar';
          $file->move($destinationPath,$file->getClientOriginalName());
          $request->request->add(['avatar' => $nama_file]);

          $user = new User;
          $user->level = $request->level;
          $user->status = '1';
          $user->username = $request->username;
          $user->password = bcrypt($request->password);
          $user->nama = $request->nama;
          $user->avatar = $request->avatar;
          $user->save();
          return back()->with('success', 'Sukses Menambahkan User');
    }
    public function update(Request $request,$id)
    {
        $id = $id;
        $user = \App\Models\User::find($id);
        $user->update($request->all());
        $user->save();
        if($request->hasFile('avatar1')){
          $request->file('avatar1')->move('assets/img/avatar',$request->file('avatar')->getClientOriginalName());
          $updet->avatar = $request->file('avatar1')->getClientOriginalName();
          $updet->save();
          return Redirect::back()->with('success','Data Berhasil diUpdate');
        }
        else{
          return Redirect::back()->with('failed','Data Gagal diUpdate');
        }
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Sukses Menghapus User');
    }
}
