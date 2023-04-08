<div>
    <div class="page-heading">
        <h3>Data Produk</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-flex justify-content-between">
                            <span>Data Produk </span>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                {{-- alert --}}
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="basicInput">Cari Data</label>
                                        <input type="text" class="form-control" placeholder="Cari Data" wire:model="search">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="basicInput">Jumlah Data</label>
                                        <select class="form-select" wire:model="perPage">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>
                                                Nama Produk
                                            </th>
                                            <th>Harga Satuan</th>
                                            <th>Stok/Produksi</th>
                                            <th>Bahan</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('/'.$produk->gambar1) }}" alt="" width="100px">
                                            </td>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>{{ $produk->harga }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalBahan1" title="Lihat Bahan" wire:click="produkId({{ $produk->id }})">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td>{{ $produk->status }}</td>
                                            <td>
                                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" wire:click="produkId({{ $produk->id }})">Edit</button>
                                                <button class="btn btn-danger" wire:click="delete({{ $produk->id }})">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $produks->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

        {{-- modal bahan --}}
        <div wire:ignore.self class="modal fade text-left" id="modalBahan1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Bahan Produk</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bahan</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bahan_produks as $bahanProduk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bahanProduk->nama_bahan }}</td>
                                                <td>{{ $bahanProduk->jumlah }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- modal tambah --}}
    <div wire:ignore.self class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="basicInput">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Nama Produk" wire:model="nama_produk">
                                    @error('nama_produk') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Harga</label>
                                    <input type="text" class="form-control" placeholder="Harga" wire:model="harga">
                                    @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Stok/Produksi</label>
                                    <input type="text" class="form-control" placeholder="Stok" wire:model="stok">
                                    @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Deskripsi</label>
                                    <textarea class="form-control" wire:model="deskripsi"></textarea>
                                    @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 1</label>
                                    <input type="file" class="form-control" wire:model="gambar1">
                                    @error('gambar1') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 2</label>
                                    <input type="file" class="form-control" wire:model="gambar2">
                                    @error('gambar2') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 3</label>
                                    <input type="file" class="form-control" wire:model="gambar3">
                                    @error('gambar3') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- bahan array--}}
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 1</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id1">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan1') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah1">
                                            @error('jumlah1') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 2</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id2">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan2') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah2">
                                            @error('jumlah2') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 3</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id3">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan3') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah3">
                                            @error('jumlah3') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 4</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id4">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan4') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah4">
                                            @error('jumlah4') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 5</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id5">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan5') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah5">
                                            @error('jumlah5') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="basicInput">Bahan 6</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select class="form-select" wire:model="bahan_id6">
                                                <option value="">Pilih Bahan</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan6') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Jumlah" wire:model="jumlah6">
                                            @error('jumlah6') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal edit --}}
    <div wire:ignore.self class="modal fade text-left" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Edit Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                        <form wire:submit.prevent="update" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="basicInput">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Nama Produk" wire:model="nama_produk">
                                    @error('nama_produk') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Harga</label>
                                    <input type="text" class="form-control" placeholder="Harga" wire:model="harga">
                                    @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- stok --}}
                                <div class="form-group mb-3">
                                    <label for="basicInput">Stok Per Produksi</label>
                                    <input type="text" class="form-control" placeholder="Stok per sekali produksi" wire:model="stok">
                                    @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="form-group mb-3"
                                    <label for="basicInput">Deskripsi</label>
                                    <textarea class="form-control" wire:model="deskripsi"></textarea>
                                    @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 1</label>
                                    <input type="file" class="form-control" wire:model="gambar4">
                                    @error('gambar4') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 2</label>
                                    <input type="file" class="form-control" wire:model="gambar5">
                                    @error('gambar5') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="basicInput">Gambar 3</label>
                                    <input type="file" class="form-control" wire:model="gambar6">
                                    @error('gambar6') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
