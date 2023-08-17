@extends('layout.master')
@section('konten')
<?php use Carbon\Carbon; 
	$mytime = Carbon::now();
	$tgl = $mytime->toDateString();

	$today = App\Models\Antrian::where('tanggal',$tgl)->where('status','Ditampilkan')->first();
?>

	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
					
						<div class="well well-trans">
							<div class="wow fadeInRight" data-wow-delay="0.1s">
								<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
						<h2 class="h-ultra">{{$mytime->format('d M Y')}}</h2>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
						<h4 class="h-light"><span class="color" style="color: red;">Nomor Antrian</span> Saat Ini :</h4>
					</div>
								<ul class="lead-list">
									<li style="font-weight: bold;
											  font-size: 15rem;
											  margin-right: 0.5rem;
											  font-family: 'Abril Fatface', serif;
											  line-height: 1;padding-left: 35%;color: blue;">
										@if($today)
										{{$today->no_antrian}}
										@else
										0
										@endif
									</li>
								</ul>
								<form action="{{route('antrians.ambil')}}" method="POST">
									@csrf
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="nama" id="nama" class="form-control input-md">
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label>Pilih Jadwal</label>
											<select name="tanggal" class="form-control">
												@foreach($jadwal as $jad)
													<?php 	$cek = App\Models\Antrian::where('tanggal',$jad->tanggal)->get();
															$hitung = count($cek); 
													?>
													@if($hitung >= $jad->kuota)
													
													@else
													<option value="{{$jad->tanggal}}">{{$jad->hari}} - {{$jad->tanggal}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>
									 	
								</div>
								<input type="submit" value="Ambil" class="btn btn-skin btn-block btn-lg">
								</form>
								<br>
								@if(Session::get('message'))
								<p style="color: red;font-weight: bolder;">{{Session::get('message')}}</p>
								@endif
							</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Registrasi Akun<small> Dapatkan Informasi Rekam Medis</small></h3>
									</div>
									<div class="panel-body">
									<form role="form" action="{{route('pasiens.add')}}" method="POST" enctype="multipart/form-data" class="lead">
										@csrf
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
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" id="first_name" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Username</label>
													<input type="text" name="username" id="last_name" class="form-control input-md">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" id="password" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control input-md">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nomor HP</label>
													<input type="text" name="nope" id="nope" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Jenis Kelamin (L/P)</label>
													<br>
													<label class="radio-inline">
												      <input type="radio" name="jk" value="L">Laki-laki
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="jk" value="P">Perempuan
												     </label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Alamat</label>
													<textarea class="form-control" name="alamat"></textarea>
												</div>
											</div>
										</div>
										
										<input type="submit" value="Daftar" class="btn btn-skin btn-block btn-lg">
										
										
									
									</form>
								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>
	
	<!-- /Section: intro -->

	<!-- Section: boxes -->
    <section id="tentang" class="home-section paddingtop-80">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Buat Janji Temu</h4>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-list-alt fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Pilih Layanan</h4>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							<i class="fa fa-user-md fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Lakukan Pemeriksaan</h4>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Dapatkan Laporan Diagnosa</h4>
							<p>
							
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Section: boxes -->

		<!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Tentang Kami</h2>
					<p>Praktek Drg. Uciria Halim</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-md-2 col-lg-2" >
				</div>
                <div class="col-sm-8 col-md-8 col-lg-8" >
					<div class="wow bounceInUp" data-wow-delay="0.2s">
	                    <p align="center">Merupakan salah satu klinik dokter gigi terpercaya di Kota Padang. Klinik dental ini melayani pengobatan pasien sakit gigi, tambal gigi berlubang, pasang kawat gigi (behel), pasang gigi palsu, cabut gigi, obat sakit gigi dan lainnya.
						Dental care atau dental clinic ini didukung oleh tenaga dokter gigi (dentist) yang ahli dan asisten ahli dalam mengobati pasien sehingga service dan pengobatan dapat dilakukan dengan cepat hingga pasien cepat sembuh. Selain melayani pasien dewasa, Dokter Gigi Uciria Halim juga melayani pasien anak. Untuk biaya dan harga, kliknik dokter gigi Kota Padang ini memberikan harga murah dan terjangkau dengan kualitas terbaik.
						</p>
					</div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2" >
				</div>
            </div>
		</div>
	</section>
	<!-- /Section: works -->

	<!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

		<div class="container">

        <div class="row">
			<div class="col-sm-6 col-md-6">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
				<img src="{{asset('frontend/img/bg2.jpg')}}" class="img-responsive" alt="" />
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				
				<div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light">Tambal Gigi</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada.</p>
					</div>
                </div>
				</div>
				
				<div class="wow fadeInRight" data-wow-delay="0.2s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light">Pasang Kawat Gigi</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada.</p>
					</div>
                </div>
				</div>
				<div class="wow fadeInRight" data-wow-delay="0.3s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light">Pasang Gigi Palsu</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada.</p>
					</div>
                </div>
				</div>


            </div>
			<div class="col-sm-3 col-md-3">
				
				<div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light">Cabut Gigi</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada.</p>
					</div>
                </div>
				</div>
				
				<div class="wow fadeInRight" data-wow-delay="0.2s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light">Pembersihan Karang Gigi</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada.</p>
					</div>
                </div>
				</div>
				

            </div>
			
        </div>		
		</div>
	</section>
	<!-- /Section: services -->
	

	
		
	<!-- Section: works -->
    <section id="galeri" class="home-section paddingbot-60">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Galeri</h2>
					<p>Praktek Drg. Uciria Halim</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="{{asset('frontend/img/bg2.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg2.jpg')}}"><img src="{{asset('frontend/img/bg2.jpg')}}" class="img-responsive" alt="img"></a></div>

                        <div class="item"><a href="{{asset('frontend/img/bg3.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg3.jpg')}}"><img src="{{asset('frontend/img/bg3.jpg')}}" class="img-responsive " alt="img"></a></div>

                        <div class="item"><a href="{{asset('frontend/img/bg2.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg2.jpg')}}"><img src="{{asset('frontend/img/bg2.jpg')}}" class="img-responsive " alt="img"></a></div>

                        <div class="item"><a href="{{asset('frontend/img/bg3.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg3.jpg')}}"><img src="{{asset('frontend/img/bg3.jpg')}}" class="img-responsive " alt="img"></a></div>

                        <div class="item"><a href="{{asset('frontend/img/bg2.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg2.jpg')}}"><img src="{{asset('frontend/img/bg2.jpg')}}" class="img-responsive " alt="img"></a></div>

                        <div class="item"><a href="{{asset('frontend/img/bg3.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('frontend/img/bg3.jpg')}}"><img src="{{asset('frontend/img/bg3.jpg')}}" class="img-responsive " alt="img"></a></div>
                    </div>
					</div>
                </div>
            </div>
		</div>
	</section>
	<!-- /Section: works -->
	
	
	<!-- Section: testimonial 
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

		<div class="carousel-reviews broun-block">
    	<div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
            
                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						         <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel text-light">					
								<img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
								<a title="" href="#">Rahmiati A</a>
								<span>Padang</span>
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
						       <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						        <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel text-light">
				                <img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
								<a title="" href="#">Fachri A</a>
								<span>Padang</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
								
								<div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						        <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel text-light">
								<img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
								<a title="" href="#">Annisa P</a>
								<span>Padang</span>
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        
							  <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						         <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel text-light">
								<img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
								<a title="" href="#">Rahmiati A</a>
								<span>Padang</span>
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
						       
							    <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						         <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel text-light">
								<img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
						       <a title="" href="#">Fachri A</a>
								<span>Padang</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
								
								<div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						        <p>(Translated by Google) The best best best Excellent service The doctor is honest. If the product is bad, it's called bad. If it's good, it's good So no cheats (Original) Ter bestbest best Pelayanan prima Dokternya jujur. kalau produknya jelek dibilang jelek. Kalau bagus dibilang bagus Jadi no tiputipu</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel text-light">
								<img src="{{asset('frontend/img/user.png')}}" alt="" class="person img-circle" />
								<a title="" href="#">Annisa P</a>
								<span>Padang</span>
							</div>
						</div>
                    </div>
                    
                   
                </div>
				
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    		</div>
		</div>
	</section>
	-->
	

	
@endsection

 <script>
    var msg = '{{Session::get('message')}}';
    var exist = '{{Session::has('message')}}';
    if(exist){
      alert(msg);
    }
  </script>