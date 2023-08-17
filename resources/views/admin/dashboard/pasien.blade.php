@extends('admin.layout.master')
@section('konten')
<?php use Carbon\Carbon; 
    $mytime = Carbon::now();
?>
	        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            	
               
                <div class="row">                  
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kartu Pasien</h4>
                                <a href="{{ URL::to('/download/kartu_pasien') }}" class="btn btn-primary"><i class="fa fa-print"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        
                                        <tbody>
                                            <form action="{{route('pasiens.edit')}}" method="POST"> 
                                                <tr>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <td>Nama Pasien</td>
                                                    <td><input type="text" class="form-control" value="{{$data->nama}}" name="nama"></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><input type="text" class="form-control" value="{{$data->alamat}}" name="alamat"></td>
                                                </tr>
                                                 <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>{{$data->jk }}</td>
                                                </tr>
                                                 <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td><input type="date" class="form-control" value="{{$data->tgl_lahir }}" name="tgl_lahir"></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Hp</td>
                                                    <td><input type="text" class="form-control" value="{{$data->nope }}" name="nope"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit" class="btn btn-success" value="Update Data" ></td>
                                                </tr>

                                            </form>
                                           
                                        </tbody>
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


    <!-- Vectormap -->
    <script src="{{asset('assets/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>
@endsection