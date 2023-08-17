<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
            @page { size: 500pt 300pt; margin: 30px;  }

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

        <div class="table-responsive">
            <table class="table table-sm">
                  
                  <tbody>
                     <tr>
                        
                        <td>Nama Pasien</td>
                        <td>: {{$data->nama}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{$data->alamat}}</td>
                    </tr>
                     <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{$data->jk }}</td>
                    </tr>
                     <tr>
                        <td>Tanggal Lahir</td>
                        <td>: {{$data->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Hp</td>
                        <td>: {{$data->nope}}</td>
                    </tr>
                   
                  </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>