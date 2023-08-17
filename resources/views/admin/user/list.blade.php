@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Manajemen User</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                @if(Session::has('success'))
			        <div class="alert alert-success solid">
			            {{ Session::get('success') }}
			            @php
			                Session::forget('success');
			            @endphp
			        </div>
			    @endif
			    @if (count($errors) > 0)
		            <div class="alert alert-danger">
		                <ul>
		                    @foreach ($errors->all() as $error)
		                      <li>{{ $error }}</li>
		                    @endforeach
		                </ul>
		            </div>
		        @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar User</h4>
                                <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah User</button>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no = 0; ?>
                                        	@foreach($user as $us)
                                            <tr>
                                                <td>{{$no+=1}}</td>
                                                <td>{{$us->nama}}</td>
                                                <td>{{$us->username}}</td>
                                                <td>{{$us->level}}</td>
                                                <td><img src="assets/img/avatar/{{$us->avatar}}" style="width: 50px;"></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modalEdit{{$us->id}}"><i class="fa fa-edit"></i> </button>
                                                    <a href="{{route('users.delete',$us->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User Sistem</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	        <div class="basic-form">
                                    <form action="{{route('users.add')}}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama"  class="form-control" placeholder="Nama">
                                                @if ($errors->has('nama'))
								                    <span class="text-danger">{{ $errors->first('nama') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username"  class="form-control" placeholder="username">
                                                @if ($errors->has('username'))
								                    <span class="text-danger">{{ $errors->first('username') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                                @if ($errors->has('password'))
								                    <span class="text-danger">{{ $errors->first('password') }}</span>
								                @endif
                                            </div>
                                        </div>
         								<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Level User</label>
                                            <div class="col-sm-10">
                                                <select name="level" class="form-control">
                                                	<option>Admin</option>
                                                	<option>Dokter</option>
                                                	<option>Resepsionis</option>
                                                </select>
                                                @if ($errors->has('level'))
								                    <span class="text-danger">{{ $errors->first('level') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
      											<div class="input-group mb-3">
		                                            <div class="custom-file">
		                                                <input type="file" name="avatar1" class="custom-file-input">
		                                                <label class="custom-file-label">Pilih Foto Profil</label>
		                                                @if ($errors->has('avatar'))
										                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
										                @endif
		                                            </div>
                                        		</div>
                                            </div>
                                        </div>

                                    
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($user as $us2)
        <div class="modal fade modalEdit{{$us2->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User Sistem</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('users.edit',$us->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="{{$us2->nama}}" class="form-control" placeholder="Nama">
                                                @if ($errors->has('nama'))
                                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" value="{{$us2->username}}" class="form-control" placeholder="username">
                                                @if ($errors->has('username'))
                                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Level User</label>
                                            <div class="col-sm-10">
                                                <select name="level" class="form-control">
                                                    <option selected>{{$us2->level}}</option>
                                                    <option >Admin</option>
                                                    <option>Dokter</option>
                                                    <option>Resepsionis</option>
                                                </select>
                                                @if ($errors->has('level'))
                                                    <span class="text-danger">{{ $errors->first('level') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar1" class="custom-file-input">
                                                        <label class="custom-file-label">Pilih Foto Profil</label>
                                                        @if ($errors->has('avatar'))
                                                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        

@endsection
@section('js')
	 <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/quixnav-init.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    


    <!-- Datatable -->
    <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection