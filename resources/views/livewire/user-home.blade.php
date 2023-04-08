<div class="bg-white">
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Produk</span>
                            </div>
                            <ul>
                                @foreach ($produks as $produk)
                                <li><a href="/u/produk">{{ $produk->nama_produk }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search bg-light">
                            {{-- text berjalan  --}}
                            <marquee behavior="" direction="left" class="text-danger font-weight-bold">Selamat Datang di SiRoti | Buka Mulai 07.00 - 22.00 WITA | Gratis Ongkir untuk Pembelian diatas Rp. 100.000,-</marquee>
                        </div>
                        <div class="hero__item set-bg" data-setbg="{{ url('/') }}/assets1/img/banner/banner_siroti.png">
                            <div class="hero__text">
                                <span>ROTI ENAK</span>
                                <h2>Mariki' <br />Beli Di SiRoti</h2>
                                <p>Lifestyle Bakery Dengan Varian Produk <br> Terbanyak dan Jaminan Kualitas <br> Produk & Layanan.</p>
                                <a href="#" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk</h2>
                    </div>
                    <div class="featured__controls mb-0">
                        {{-- search --}}
                        <div class="row text-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Search..." wire:model="search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($produks as $produk)
                <div wire:ignore.self class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item ">
                        <div class="featured__item__pic set-bg bg-light">
                            <ul class="featured__item__pic__hover">
                                <img src="{{url('/')}}/{{ $produk->gambar1 }}" alt="" class="img-fluid rounded mb-2">
                                {{-- detail, beli, dan keranjang  --}}
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6 class="text-uppercase"><a href="#">{{ $produk->nama_produk }}</a></h6>
                            <h5>Rp. {{ number_format($produk->harga) }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="#">
                        <img src="{{ url('/') }}/assets1/img/banner/banner11.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="#">
                        <img src="{{ url('/') }}/assets1/img/banner/banner12.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProduks as $latestProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $latestProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $latestProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($latestProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProduks as $latestProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $latestProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $latestProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($latestProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topProduks as $topProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $topProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $topProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($topProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topProduks as $topProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $topProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $topProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($topProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Expansive Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($expansiveProduks as $expansiveProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $expansiveProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $expansiveProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($expansiveProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($expansiveProduks as $expansiveProduk)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/') }}/{{ $expansiveProduk->gambar1 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $expansiveProduk->nama_produk }}</h6>
                                        <span>Rp. {{ number_format($expansiveProduk->harga) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
</div>
