@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Manajemen obat</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">obat</a></li>
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
                                <h4 class="card-title">Daftar obat</h4>
                                <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah obat</button>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Fungsi</th>
                                                <th>Dosis</th>
                                                <th>Aturan Pakai</th>
                                                <th>Tanggal Kadaluarsa</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no = 0; ?>
                                        	@foreach($obat as $us)
                                            <tr style="color: black;">
                                                <td>{{$no+=1}}</td>
                                                <td>{{$us->nama_obat}}</td>
                                                <td>{{$us->fungsi}}</td>
                                                    <td>{{$us->dosis}}</td>
                                                        <td>{{$us->aturan_pakai}}</td>
                                                            <td>{{$us->tgl_kadaluarsa}}</td>
                                                <td>Rp.@convert($us->harga)</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modalEdit{{$us->id}}"><i class="fa fa-edit"></i> </button>
                                                    <a href="{{route('obats.delete',$us->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Fungsi</th>
                                                <th>Dosis</th>
                                                <th>Aturan Pakai</th>
                                                <th>Tanggal Kadaluarsa</th>
                                                <th>Harga</th>
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
                        <h5 class="modal-title">Tambah obat</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	        <div class="basic-form">
                                    <form action="{{route('obats.add')}}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">nama obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_obat"  class="form-control" placeholder="nama_obat">
                                                @if ($errors->has('nama_obat'))
								                    <span class="text-danger">{{ $errors->first('nama_obat') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">fungsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="fungsi" class="form-control" placeholder="fungsi obat"></textarea>
                                                @if ($errors->has('fungsi'))
								                    <span class="text-danger">{{ $errors->first('fungsi') }}</span>
								                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Dosis</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="dosis"  class="form-control" placeholder="dosis">
                                                @if ($errors->has('dosis'))
                                                    <span class="text-danger">{{ $errors->first('dosis') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Aturan Pakai</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="aturan_pakai"  class="form-control" placeholder="aturan_pakai">
                                                @if ($errors->has('aturan_pakai'))
                                                    <span class="text-danger">{{ $errors->first('aturan_pakai') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl_kadaluarsa"  class="form-control" placeholder="tgl_kadaluarsa">
                                                @if ($errors->has('tgl_kadaluarsa'))
                                                    <span class="text-danger">{{ $errors->first('tgl_kadaluarsa') }}</span>
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
        @foreach($obat as $layan)
        <div class="modal fade modalEdit{{$layan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit obat</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('obats.edit',$layan->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">nama obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_obat" value="{{$layan->nama_obat}}" class="form-control" placeholder="nama_obat">
                                                @if ($errors->has('nama_obat'))
                                                    <span class="text-danger">{{ $errors->first('nama_obat') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">fungsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="fungsi" class="form-control"  placeholder="fungsi obat">{{$layan->fungsi}}</textarea>
                                                @if ($errors->has('fungsi'))
                                                    <span class="text-danger">{{ $errors->first('fungsi') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Dosis</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="dosis" value="{{$layan->dosis}}"  class="form-control" placeholder="dosis">
                                                @if ($errors->has('dosis'))
                                                    <span class="text-danger">{{ $errors->first('dosis') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Aturan Pakai</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="aturan_pakai" value="{{$layan->aturan_pakai}}" class="form-control" placeholder="aturan_pakai">
                                                @if ($errors->has('aturan_pakai'))
                                                    <span class="text-danger">{{ $errors->first('aturan_pakai') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl_kadaluarsa" value="{{$layan->tgl_kadaluarsa}}" class="form-control" placeholder="tgl_kadaluarsa">
                                                @if ($errors->has('tgl_kadaluarsa'))
                                                    <span class="text-danger">{{ $errors->first('tgl_kadaluarsa') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="harga" value="{{$layan->harga}}" class="number-format form-control " placeholder="Biaya">
                                                @if ($errors->has('harga'))
                                                    <span class="text-danger">{{ $errors->first('harga') }}</span>
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