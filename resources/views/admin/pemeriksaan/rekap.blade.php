<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
            @page { size: A4; size: landscape; margin: 30px;  }

            .line-title {
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
    </style>
</head>

<body>
    <img src="assets/img/avatar/logo.png" style="width: 60px;height: auto;position: absolute;">
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span style="line-height: 1.6;font-weight: bold;">
                        PRAKTEK DOKTER GIGI UCIRIA HALIM <br>Jl Kamang No 2 Jati, Padang, Sumatera Barat, Indonesia
                    </span>
                </td>
            </tr>

            
        </table>
        <hr class="line-title">
        <h4 align="center">Rekap Pemeriksaan</h4>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>            
                        <th>Tanggal Rekam</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; $no2 = 0; ?>
                    @foreach($data as $periksa)
                         <?php 
                            $details = App\Models\Detail::where('rekam_id',$periksa->id)->get();
                         ?>
                        <tr style="color:black;">
                            <td>{{$no+=1}}</td>
                            <td>{{$periksa->nama_pasien}}</td>
                            <td colspan="2">{{$periksa->keluhan}}</td>
                            <td>{{$periksa->tgl_rekam}}</td>
                        </tr>          
                        <tr>
                            <td>Layanan</td>
                            <td>Obat</td>
                            <td>Diagnosa</td>
                            <td>Dosis</td>
                            <td>Total Biaya</td>
                        </tr>
                        @foreach($details as $det)
                        <tr style="color:black;">
                                         
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
                        
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>