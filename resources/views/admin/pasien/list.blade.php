@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Manajemen Pasien</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pasien</a></li>
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
                                <h4 class="card-title">Daftar Pasien</h4>
                                

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Nomor HP</th>
                                                <th>Alamat</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $no = 0; ?>
                                        	@foreach($pasien as $us)
                                            <tr style="color:black;">
                                                <td>{{$no+=1}}</td>
                                                <td>{{$us->nama}}</td>
                                                <td>{{$us->username}}</td>
                                                    <td>{{$us->jk}}</td>
                                                        <td>{{$us->tgl_lahir}}</td>
                                                            <td>{{$us->nope}}</td>
                                                <td>{{$us->alamat}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Nomor HP</th>
                                                <th>Alamat</th>
                                                
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