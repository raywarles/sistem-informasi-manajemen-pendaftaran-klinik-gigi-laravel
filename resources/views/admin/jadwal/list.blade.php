@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Manajemen jadwal</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">jadwal</a></li>
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
                                <h4 class="card-title">Daftar jadwal</h4>
                                <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah jadwal</button>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Kuota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no = 0; ?>
                                        	@foreach($jadwal as $us)
                                            <tr style="color: black;">
                                                <td>{{$no+=1}}</td>
                                                <td>{{$us->hari}}</td>
                                                <td>{{$us->tanggal}}</td>
   
                                                <td>{{$us->kuota}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modalEdit{{$us->id}}"><i class="fa fa-edit"></i> </button>
                                                    <a href="{{route('jadwals.delete',$us->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Kuota</th>
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
                        <h5 class="modal-title">Tambah jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	        <div class="basic-form">
                                    <form action="{{route('jadwals.add')}}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Hari</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="hari">
                                                    <option>Senin</option>
                                                    <option>Selasa</option>
                                                    <option>Rabu</option>
                                                    <option>Kamis</option>
                                                    <option>Jum'at</option>
                                                    <option>Sabtu</option>
                                                    <option>Minggu</option>
                                                </select>
                                                @if ($errors->has('hari'))
								                    <span class="text-danger">{{ $errors->first('hari') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tanggal"  class="form-control" placeholder="tanggal">
                                                @if ($errors->has('tanggal'))
                                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kuota</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="kuota"  class="form-control" placeholder="kuota">
                                                @if ($errors->has('kuota'))
                                                    <span class="text-danger">{{ $errors->first('kuota') }}</span>
                                                @endif
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
        @foreach($jadwal as $layan)
        <div class="modal fade modalEdit{{$layan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('jadwals.edit',$layan->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Hari</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="hari">
                                                    <option>{{$layan->hari}}</option>
                                                    <option>Senin</option>
                                                    <option>Selasa</option>
                                                    <option>Rabu</option>
                                                    <option>Kamis</option>
                                                    <option>Jum'at</option>
                                                    <option>Sabtu</option>
                                                    <option>Minggu</option>
                                                </select>
                                                @if ($errors->has('hari'))
                                                    <span class="text-danger">{{ $errors->first('hari') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tanggal" value="{{$layan->tanggal}}" class="form-control" placeholder="tanggal">
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kuota</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="kuota" value="{{$layan->kuota}}" class="form-control" placeholder="kuota">
                                                @if ($errors->has('kuota'))
                                                    <span class="text-danger">{{ $errors->first('kuota') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        

                                    
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
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
        <script type="text/javascript">
        $(function(){
            $('.number-format').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
@endsection