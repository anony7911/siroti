@extends('layouts.app')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pelanggan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $pelanggans->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Penjualan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $penjualans->count() }}</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldBookmark"></i>

                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Produk</h6>
                                    <h6 class="font-extrabold mb-0">{{ $produks->count() }}</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Bahan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bahans->count() }}</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="text-end">
                            <h3>Hi, {{ Auth::user()->name }}</h3>
                            <p class="text-muted mb-1">Welcome back</p>
                            <h5 class="mb-0">Nice to see you again!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            {{-- pabrik roti karunia mandiri kendari --}}
            {{-- selamat datang di website --}}
            <div class="card">
                <div class="card-body">
                    <h1>
                        <marquee behavior="" direction="">Selamat Datang di Website Pabrik Roti Karunia Mandiri</marquee>
                    </h1>
                </div>
                <div class="card-footer">
                    <span>
                        <marquee behavior="" direction="">
                            Jl. Kancil, No.17 B, Kelurahan Andonohu, Kota Kendari, Sulawesi Tenggara
                        </marquee>
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
