<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg"
        data-setbg="{{ url('/') }}/assets1/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Produk</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Top Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($topProduks as $top)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('/') }}/{{ $top->gambar1 }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $top->nama_produk }}</h6>
                                                    <span>Rp. {{ number_format($top->harga) }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($topProduks as $top)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('/') }}/{{ $top->gambar1 }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $top->nama_produk }}</h6>
                                                    <span>Rp. {{ number_format($top->harga) }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latestProduks as $latest)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('/') }}/{{ $latest->gambar1 }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latest->nama_produk }}</h6>
                                                    <span>Rp. {{ number_format($latest->harga) }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latestProduks as $latest)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('/') }}/{{ $latest->gambar1 }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latest->nama_produk }}</h6>
                                                    <span>Rp. {{ number_format($latest->harga) }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    {{-- alert --}}
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $produks->count() }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($produks as $produk)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ url('/') }}/{{ $produk->gambar1 }}">
                                        <ul class="product__item__pic__hover">
                                            <li data-bs-toggle="toltipe" title="Add To Cart"><a
                                                    wire:click.prevent='addToCart({{ $produk->id }})'><i
                                                        class="fa fa-plus"></i></a></li>
                                            <li data-bs-toggle="toltipe" title="Buy"><a
                                                    wire:click.prevent='goToCart({{ $produk->id }})'><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                            {{-- detail with modal --}}
                                            {{-- <li data-bs-toggle="toltipe" title="Detail"><a href="#" wire:click.prevent='produkId({{ $produk->id }})'><i
                                                        class="fa fa-eye"></i></a></li> --}}
                                            <li data-bs-toggle="toltipe" title="Share"><a href="#"><i
                                                        class="fa fa-share"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6 class="text-uppercase"><a href="#">{{ $produk->nama_produk }}</a></h6>
                                        <h5>Rp. {{ number_format($produk->harga) }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</div>
