@extends('Front.Layout.master', ['title' => 'Beranda'])

@section('konten')
    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center"
                style="border-radius: 50px;
            background: #f2f2f2;
            box-shadow: 5px 5px 10px #818181, -5px -5px 10px #ffffff;">
                <div class="col-lg-5">
                    <div class="h-100" {{-- style="border: 50px solid; border-color: transparent #13357B transparent #13357B;" --}}>
                        <img src="Front/img/about.png" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-7" {{-- style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);" --}}>
                    <h5 class="section-about-title pe-3">About Us</h5>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Travela</span></h1>
                    <p class="mb-4 ">Bisalive hadir sebagai jawaban atas tuntutan zaman di mana para pelaku usaha,
                        terutama digital entrepreneur, perlu memiliki kehadiran yang kuat di berbagai
                        platform online seperti TikTok, Shopee, Instagram, dan sebagainya.</p>
                    <p class="mb-2">Meningkatnya preferensi konsumen terhadap konten live streaming juga menjadi
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
    <div class="container-fluid guide py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Influencer</h5>
                <h1 class="mb-0">Teks Teks Teks</h1>
            </div>
            <div class="row d-flex justify-content-center g-4">
                @foreach ($influencer as $data)
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item" style="border-radius: 1rem;
                    background: #f2f2f2;
                    box-shadow: 5px 5px 10px #818181, -5px -5px 10px #ffffff;">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="{{ asset('storage/'.$data->path_foto) }}" class="img-fluid w-100 rounded-top" alt="Image">
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
            </div>
        </div>
    </div>
    <!-- Travel Guide End -->

    <div class="container-fluid packages py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Packages</h5>
                <h1 class="mb-0">Awesome Packages</h1>
            </div>
            <div class="packages-carousel owl-carousel">
                <div class="packages-item">
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-2">Package 1</h5>
                            {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                            <p class="mb-2">- Booking Time [09.00 - 14.00]</p>
                            <p class="mb-2">- Booking Day [max 3 hari/minggu]</p>
                            <p class="mb-2">- Max 2 Jam / Booking Day</p>
                            <p class="mb-2">- Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah satu]</p>
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
                <div class="packages-item">
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-2">Package 2</h5>
                            {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                            <p class="mb-2">- Booking Time [14.00 - 22.00]</p>
                            <p class="mb-2">- Booking Day [max 3 hari/minggu]</p>
                            <p class="mb-2">- Max 2 Jam / Booking Day</p>
                            <p class="mb-2">- Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah satu]</p>
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
                <div class="packages-item">
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-2">Package 3</h5>
                            {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                            <p class="mb-2">- Booking Time [By Request]</p>
                            <p class="mb-2">- Booking Day [max 4 hari/minggu]</p>
                            <p class="mb-2">- Max 3 Jam / Booking Day</p>
                            <p class="mb-2">- Live on Shoppe/TikTok/IG/FB/Media Lainnya [pilih salah satu]</p>
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
                <div class="packages-item">
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-2">Package 4</h5>
                            {{-- <small class="text-uppercase">Hotel Deals</small> --}}
                            <p class="mb-2">- Vidio Review Produk [Bisa menggunakan talent atau vidio produk]</p>
                            <p class="mb-2">- Upload ke seluruh sosial media bisalive [YT/Shoppe/TikTok/IG/FB]</p>
                            <p class="mb-2">- Foto produk untuk upload konten</p>
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
@endsection
