@extends('admin.layout.master')
@section('konten')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Data Pemeriksaan</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pemeriksaan</a></li>
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
                                <h4 class="card-title">Daftar Pemeriksaan</h4>

                                @if(Session::get('level') == 'Resepsionis')
                                <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah pemeriksaan</button>
                                <a href="{{ URL::to('/download/pemeriksaan_rekap') }}" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                @endif


                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Keluhan</th>
                                                <th>Tanggal Rekam</th>

                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach($pemeriksaan as $periksa)
                                                <tr>
                                                    <td>{{$no+=1}}</td>
                                                    <td>{{$periksa->nama_pasien}}</td>
                                                    <td>{{$periksa->keluhan}}</td>
                                                    <td>{{$periksa->tgl_rekam}}</td>
     
                                                        <td>
                                                            <button  type="button" class="btn btn-info" data-toggle="modal" data-target=".lihat{{$periksa->id}}"><i class="fa fa-eye"></i></button>
                                                            @if($periksa->status != "Selesai" && Session::get('level') == 'Dokter')
                                                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".detail{{$periksa->id}}"><i class="fa fa-plus"></i> Detail</button>
                                                            
                                                                <a href="{{route('pemeriksaans.done',$periksa->id)}}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                            @endif
                                                        </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Keluhan</th>
                                                <th>Tanggal Rekam</th>
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
                        <h5 class="modal-title">Tambah pemeriksaan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('pemeriksaans.add')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pasien</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="pasien_id">
                                                    @foreach($pasien as $pas)
                                                        <option value="{{$pas->id}}">{{$pas->nama}}</option>
                                                    @endforeach 
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keluhan</label>
                                            <div class="col-sm-10">
                                               <textarea name="keluhan" class="form-control" placeholder="Keluhan"></textarea>
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
        @foreach($pemeriksaan as $periksa)
        <div class="modal fade detail{{$periksa->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah pemeriksaan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="basic-form">
                                    <form action="{{route('pemeriksaans.detail')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="rekam_id" value="{{$periksa->id}}">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Layanan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" multiple name="layanan_id[]">
                                                    <<option selected disabled>Tahan tombol ctrl untuk pilih lebih dari 1</option>
                                                    @foreach($layanan as $pas1)
                                                        <option value="{{$pas1->id}}">{{$pas1->layanan}}</option>
                                                    @endforeach 
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Obat</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" multiple name="obat_id[]">
                                                    <option selected disabled>Tahan tombol ctrl untuk pilih lebih dari 1</option>
                                                    @foreach($obat as $pas)
                                                        <option value="{{$pas->id}}">{{$pas->nama_obat}}</option>
                                                    @endforeach 
                                                 </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Diagnosa</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="diagnosa"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Resep</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="resep"></textarea>
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
        @endforeach
        @foreach($pemeriksaan as $periksa)
        <?php 
            $details = App\Models\Detail::where('rekam_id',$periksa->id)->get();
         ?>
        <div class="modal fade lihat{{$periksa->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail pemeriksaan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Layanan</th>
                                            <th>Obat</th>
                                            <th>Diagnosa</th>
                                            <th>Resep</th>
                                            <th>Total Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($details as $det)
                                            <tr>
                                                <td>{{$i+=1}}</td>
                                                <?php 
                                                    $id1 = explode(',', $det->layanan_id);
                                                    $id2 = explode(',', $det->obat_id);
                                                 ?>
                                                <td>
                                                    <?php foreach($id1 as $i1) {
                                                        $see = App\Models\Layanan::find($i1);

                                                        echo "- ".$see->layanan."<br>";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php foreach($id2 as $i2) {
                                                        $see2 = App\Models\Obat::find($i2);

                                                        echo "- ".$see2->nama_obat."<br>";
                                                    }

                                                    ?>
                                                </td>
                                                <td>{{$det->diagnosa}}</td>
                                                <td>{{$det->resep}}</td>
                                                    <td>Rp.{{number_format($det->total_biaya,2)}},-</td>
                                            </tr>
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
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