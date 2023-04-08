<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('/') }}/assets1/img/breadcrumb.jpg" style="background-image: url(&quot;{{ url('/') }}/assets1/img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Keranjang</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Keranjang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- alert --}}
                    @if (session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                        {{-- close btn --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    {{-- end alert --}}
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($keranjangs as $keranjang)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ url('/') }}/{{ $keranjang->gambar1 }}" alt="">
                                        <h5>{{ $keranjang->nama_produk }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{ number_format($keranjang->harga) }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty11">
                                                <span class="dec qtybtn" wire:click="decrement({{ $keranjang->id }})">-</span>
                                                <input type="text" value="{{ $keranjang->jumlah }}" disabled>
                                                <span class="inc qtybtn" wire:click="increment({{ $keranjang->id }})">+</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rp. {{ number_format($keranjang->harga * $keranjang->jumlah) }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close cursor-pointer" wire:click="destroy({{ $keranjang->id }})"></span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h5 class="text-danger">Keranjang masih kosong. Silahkan lanjutkan belanja.</h5>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="/u/produk" class="btn btn-secondary cart-btn">LANJUTKAN BELANJA</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout mt-2">
                        {{-- <h5>Total Harga</h5> --}}
                        <ul>
                            <li>Total Bayar
                                <span class="text-danger">
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($keranjangs as $keranjang)
                                    @php
                                    $total += $keranjang->harga * $keranjang->jumlah;
                                    @endphp
                                    @endforeach
                                    Rp. {{ number_format($total) }},-
                                    <input type="hidden" wire:model="total" value="{{ $total }}">
                                </span>
                            </li>
                        </ul>
                        <a class="primary-btn text-white" wire:click.prevent="checkout">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <style>
        /* decrement & increment */
        .pro-qty11 .dec.qtybtn {
            background : #f1f1f1;
            color      : #000;
            font-size  : 16px;
            font-weight: 700;
            line-height: 1;
            padding    : 0 10px;
            position   : relative;
            z-index    : 1;
            /* pointer */
            cursor: pointer;
        }

        /* BTN HOVER */
        .pro-qty11 .dec.qtybtn:hover {
            background: #ff6e40;
            color     : #fff;
        }

        .pro-qty11 .inc.qtybtn {
            background : #f1f1f1;
            color      : #000;
            font-size  : 16px;
            font-weight: 700;
            line-height: 1;
            padding    : 0 10px;
            position   : relative;
            z-index    : 1;
            cursor     : pointer;
        }

        /* BTN HOVER */
        .pro-qty11 .inc.qtybtn:hover {
            background: #ff6e40;
            color     : #fff;
        }

        /* input */
        .pro-qty11 input {
            background : #f1f1f1;
            border     : none;
            color      : #000;
            font-size  : 16px;
            font-weight: 700;
            line-height: 1;
            padding    : 0 10px;
            text-align : center;
            width      : 40px;
        }

        .primary-btn {
            background: #fc6132;
            border    : none;
            display   : block;
            /* text color */
            color : #fff;
            cursor: pointer;

        }
        /* btn hover */
        .primary-btn:hover {
            background: #fa4007;
            border    : none;
            display   : block;
            /* text color */
            color : #fff;
            cursor: pointer;
        }

    </style>
</div>
