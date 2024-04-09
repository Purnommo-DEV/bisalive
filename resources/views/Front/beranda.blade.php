@extends('Front.Layout.master', ['title' => 'Beranda'])

@section('konten')
    <!-- About Start -->
    <div class="wow fadeInUp container-fluid about py-5" style="padding: 2rem;">
        <div class="container py-5" style="padding-bottom: 2rem !important">
            <div class="row g-5 align-items-center"
                style="border-radius: 50px;
            background:linear-gradient(#22b3c1, rgba(139, 168, 0, 0.57)), url({{ asset('All/assets/img/bg_bisalive.jpg') }});
            box-shadow: 5px 5px 10px #818181, -5px -5px 10px #ffffff;
            background-size: cover;
            background-attachment: fixed; padding-bottom: 2rem;">
                <div class="col-lg-5">
                    <div class="h-100" {{-- style="border: 50px solid; border-color: transparent #22b3c1 transparent #22b3c1;" --}}>
                        <img src="Front/img/about.png" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-7" {{-- style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);" --}}>
                    <h5 class="section-about-title pe-3">About Us</h5>
                    <h1 style="color:white" class="mb-4">Welcome to <span style="color: white;">BisaLive</span></h1>
                    <p style="color:white" class="mb-4 ">Bisalive hadir sebagai jawaban atas tuntutan zaman di mana para
                        pelaku usaha,
                        terutama digital entrepreneur, perlu memiliki kehadiran yang kuat di berbagai
                        platform online seperti TikTok, Shopee, Instagram, dan sebagainya.</p>
                    <p style="color:white" class="mb-2">Meningkatnya preferensi konsumen terhadap konten live streaming
                        juga menjadi
                        salah satu alasan utama kehadiran Bisalive. Dengan memahami bahwa tidak semua
                        pelaku usaha memiliki waktu, kemampuan, atau sumber daya untuk melakukan live
                        streaming secara profesional, Bisalive hadir untuk mempermudah mereka dalam
                        memanfaatkan potensi live streaming untuk memasarkan produk mereka secara
                        efektif.</p>
                    {{-- <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                            </div>
                        </div> --}}
                    {{-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Travel Guide Start -->
    <div class="container-fluid guide py-1 mb-4" style="padding: 2rem;">
        <div class="container py-5">
            <div class="row g-5 align-items-center"
                style="border-radius: 50px;
                    background:linear-gradient(#ffffff, rgba(255, 255, 255, 0.57)), url({{ asset('All/assets/img/bg_bisalive.jpg') }});
                    box-shadow: 5px 5px 10px #818181, -5px -5px 10px #ffffff54;
                    background-size: cover;
                    background-attachment: fixed; padding-left: 1.3rem;">
                <div class="mx-auto text-center mb-4" style="max-width: 900px;">
                    <h5 class="section-title px-3">Influencer</h5>
                    <h1 class="mb-0">Teks Teks Teks</h1>
                </div>
                <div class="row d-flex justify-content-center g-4" @auth style="margin-bottom: 4rem;" @endauth>
                    @foreach ($influencer as $data)
                        <div class="col-md-6 col-lg-3">
                            <div class="wow fadeInUp guide-item"
                                style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #e1e1e1, -5px -5px 10px #fff;">
                                <div class="guide-img">
                                    <div class="guide-img-efects">
                                        @if ($data->path_foto == null)
                                            <img src="{{ asset('All/assets/img/no_image.png') }}"
                                                class="img-fluid w-100 rounded-top" alt="Image">
                                        @else
                                            <img src="{{ asset('storage/' . $data->path_foto) }}"
                                                class="img-fluid w-100 rounded-top" alt="Image">
                                        @endif
                                    </div>
                                    <div class="guide-icon rounded-pill p-2">
                                        @foreach ($data->relasi_medsos as $medsos)
                                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                    class="fab fa-{{ $medsos->medsos }}"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="guide-title text-center rounded-bottom p-4">
                                    <div class="guide-title-inner">
                                        <h4 class="mt-3">{{ $data->nama }}</h4>
                                        <p class="mb-0">{{ $data->lokasi_live }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @auth
                    @else
                        <div class="col-12">
                            <div class="text-center" style="margin-bottom: 4rem;">
                                <a class="btn btn-primary rounded-pill py-3 px-5 mt-2"
                                    href="{{ route('HalamanLogin') }}">Selengkapnya</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <!-- Travel Guide End -->

    <style>
        .btn-hover:hover {
            color: #000000!important;
        }
    </style>
    <div class="container-fluid packages" style="padding: 2rem;">
        <div class="container py-4">
            <div class="row g-5 align-items-center"
                style="border-radius: 50px;
                background:linear-gradient(#ffffff, rgba(255, 255, 255, 0.57)), url({{ asset('All/assets/img/bg_bisalive.jpg') }});
                box-shadow: 5px 5px 10px #818181, -5px -5px 10px #ffffff54;
                background-size: cover;
                background-attachment: fixed; padding: 1rem;">
                <div class="mx-auto text-center mb-5" style="max-width: 900px; margin-top: 1rem!important;">
                    <h5 class="section-title px-3">Packages</h5>
                    <h1 class="mb-0">Awesome Packages</h1>
                </div>
                <div class="packages-carousel owl-carousel" style="margin-bottom: 4rem;">
                    <div class="wow fadeInUp packages-item" style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #e1e1e1, -5px -5px 10px #fff;">
                        <div class="packages-content bg-light" style="border-radius: 1rem;">
                            <div class="p-3 pb-0">
                                <h5 class="mb-2" style="color: #22b3c1; font-weight:600;">Package 1</h5>
                                <ul class="pricing-list mt-3">
                                    <li class="pricing-list-item">Booking Time [09.00 - 14.00]</li>

                                    <li class="pricing-list-item">Booking Day [max 3 hari/minggu]</li>

                                    <li class="pricing-list-item">Max 2 Jam / Booking Day</li>

                                    <li class="pricing-list-item">Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah
                                        satu]</li>
                                </ul>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">5.000.000</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Durasi 1 bulan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInUp packages-item" style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #e1e1e1, -5px -5px 10px #fff;">
                        <div class="packages-content bg-light" style="border-radius: 1rem;">
                            <div class="p-3 pb-0">
                                <h5 class="mb-2" style="color: #22b3c1; font-weight:600;">Package 2</h5>
                                {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                                <ul class="pricing-list mt-3">
                                    <li class="pricing-list-item">Booking Time [14.00 - 22.00]</li>

                                    <li class="pricing-list-item">Booking Day [max 3 hari/minggu]</li>

                                    <li class="pricing-list-item">Max 2 Jam / Booking Day</li>

                                    <li class="pricing-list-item">Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah
                                        satu]</li>
                                </ul>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">6.500.000</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Durasi 1 bulan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInUp packages-item" style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #e1e1e1, -5px -5px 10px #fff;">
                        <div class="packages-content bg-light" style="border-radius: 1rem;">
                            <div class="p-3 pb-0">
                                <h5 class="mb-2" style="color: #22b3c1; font-weight:600;">Package 3</h5>
                                {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                                <ul class="pricing-list mt-3">
                                    <li class="pricing-list-item">Booking Time [By Request]</li>

                                    <li class="pricing-list-item">Booking Day [max 4 hari/minggu]</li>

                                    <li class="pricing-list-item">Max 2 Jam / Booking Day</li>

                                    <li class="pricing-list-item">Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah
                                        satu]</li>
                                </ul>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">10.000.000</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Durasi 1 bulan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInUp packages-item" style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #e1e1e1, -5px -5px 10px #fff;">
                        <div class="packages-content bg-light" style="border-radius: 1rem;">
                            <div class="p-3 pb-0">
                                <h5 class="mb-2" style="color: #22b3c1; font-weight:600;">Package 4</h5>
                                {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                                <ul class="pricing-list mt-3">
                                    <li class="pricing-list-item">Vidio Review Produk [Bisa menggunakan talent atau vidio
                                        produk]</li>

                                    <li class="pricing-list-item">Upload ke seluruh sosial media bisalive
                                        [YT/Shoppe/TikTok/IG/FB]</li>

                                    <li class="pricing-list-item">Foto produk untuk upload konten</li>

                                    {{-- <li class="pricing-list-item">Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah satu]</li> --}}
                                </ul>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">500.000</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">1 Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
