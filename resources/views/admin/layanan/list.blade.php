@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Manajemen Layanan</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Layanan</a></li>
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
                                <h4 class="card-title">Daftar Layanan</h4>
                                <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Layanan</button>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Layanan</th>
                                                <th>Deskripsi</th>
                                                <th>Biaya</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no = 0; ?>
                                        	@foreach($layanan as $us)
                                            <tr style="color:black;">
                                                <td>{{$no+=1}}</td>
                                                <td>{{$us->layanan}}</td>
                                                <td>{{$us->deskripsi}}</td>
                                                <td>Rp.@convert($us->harga)</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modalEdit{{$us->id}}"><i class="fa fa-edit"></i> </button>
                                                    <a href="{{route('layanans.delete',$us->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Layanan</th>
                                                <th>Deskripsi</th>
                                                <th>Biaya</th>
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
                        <h5 class="modal-title">Tambah Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	        <div class="basic-form">
                                    <form action="{{route('layanans.add')}}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Layanan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="layanan"  class="form-control" placeholder="Layanan">
                                                @if ($errors->has('layanan'))
								                    <span class="text-danger">{{ $errors->first('layanan') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Layanan"></textarea>
                                                @if ($errors->has('deskripsi'))
								                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="harga" class="number-format form-control " placeholder="Biaya">
                                                @if ($errors->has('harga'))
								                    <span class="text-danger">{{ $errors->first('harga') }}</span>
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
        @foreach($layanan as $layan)
        <div class="modal fade modalEdit{{$layan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('layanans.edit',$layan->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Layanan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="layanan" value="{{$layan->layanan}}" class="form-control" placeholder="Layanan">
                                                @if ($errors->has('layanan'))
                                                    <span class="text-danger">{{ $errors->first('layanan') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Layanan">{{$layan->deskripsi}}</textarea>
                                                @if ($errors->has('deskripsi'))
                                                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="harga" value="{{$layan->harga}}" class="number-format form-control" placeholder="Biaya">
                                                @if ($errors->has('harga'))
                                                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                                                @endif
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