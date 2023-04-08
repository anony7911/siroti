<?php

namespace App\Http\Livewire;

use App\Models\Bahan;
use App\Models\Produk;
use Livewire\Component;
use App\Models\BahanProduk;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class DataProduk extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;

    public $produk, $nama_produk, $harga, $stok, $deskripsi, $gambar1, $gambar2, $gambar3, $gambar4, $gambar5, $gambar6, $status, $produk_id;

    protected $produks, $bahans, $bahan_produks, $bahan1, $jumlah_bahan;

    public $bahan_id1, $bahan_id2, $bahan_id3,$bahan_id4,$bahan_id5,$bahan_id6, $jumlah1, $jumlah2, $jumlah3, $jumlah4, $jumlah5, $jumlah6;

    public $bahan = [], $jumlah, $bahan_id, $nama_bahan;
    public $i = 1;

    protected $updateQueryString = ['search' => ['except' => ''], 'sortField' => ['except' => ''], 'sortAsc' => ['except' => '1'], 'perPage' => ['except' => '10']];
    public $search, $sortField, $sortAsc = true, $perPage = '10';

    public function addBahan()
    {
        // $i       = $i+1;
        $this->i++;
        array_push($this->bahan, $this->i);
    }
    public function render()
    {
        $this->produks = Produk::where('nama_produk', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
            // dd($this->produks);
        $this->bahans = Bahan::all();
        $this->bahan_produks = BahanProduk::join('bahans', 'bahans.id', '=', 'bahan_produks.bahan_id')
            ->join('produks', 'produks.id', '=', 'bahan_produks.produk_id')
            ->select('bahans.nama_bahan', 'bahan_produks.jumlah')
            ->where('produk_id', $this->produk_id)->get();
        return view('livewire.data-produk', [
            'produks' => $this->produks,
            'bahans' => $this->bahans,
            'bahan_produks' => $this->bahan_produks,
            'jumlah_bahan' => $this->jumlah_bahan,
        ])->extends('layouts.app')->section('content');
    }

    public function resetInput()
    {
        $this->nama_produk = '';
        $this->harga       = '';
        $this->stok        = '';
        $this->deskripsi   = '';
        $this->gambar1     = '';
        $this->gambar2     = '';
        $this->gambar3     = '';
        $this->gambar4     = '';
        $this->gambar5     = '';
        $this->gambar6     = '';
        $this->status      = '';
        $this->produk_id   = '';
        $this->bahan_id1   = '';
        $this->bahan_id2   = '';
        $this->bahan_id3   = '';
        $this->bahan_id4   = '';
        $this->bahan_id5   = '';
        $this->bahan_id6   = '';
        $this->jumlah1     = '';
        $this->jumlah2     = '';
        $this->jumlah3     = '';
        $this->jumlah4     = '';
        $this->jumlah5     = '';
        $this->jumlah6     = '';


    }

    public function produkId($id)
    {
        $this->produk_id   = $id;
        $produk            = Produk::find($this->produk_id);
        $this->nama_produk = $produk->nama_produk;
        $this->harga       = $produk->harga;
        $this->stok        = $produk->stok;
        $this->deskripsi   = $produk->deskripsi;
        $this->status      = $produk->status;
        $this->gambar1     = $produk->gambar1;
        $this->gambar2     = $produk->gambar2;
        $this->gambar3     = $produk->gambar3;
        $this->jumlah_bahan = BahanProduk::count();
        $i = 1;
        $this->bahan_produks = BahanProduk::join('bahans', 'bahans.id', '=', 'bahan_produks.bahan_id')
            ->join('produks', 'produks.id', '=', 'bahan_produks.produk_id')
            ->select('bahans.nama_bahan', 'bahan_produks.jumlah')
            ->where('produk_id', $this->produk_id)->get();


        // dd($this->bahan);
    }

    public function store(){
        $numtextrand = rand(1, 10000000000000);
        $this->validate([
            'nama_produk' => 'required',
            'harga'       => 'required',
            'deskripsi'   => 'required',
            'gambar1'     => 'required',
            'stok'        => 'required',
        ]);

        if($this->gambar1){
            $imgproduk1 = time().'.'.$numtextrand.$this->gambar1->extension();
        }
        if($this->gambar2){
            $imgproduk2 = time().'.'.$numtextrand.$this->gambar2->extension();
            $img2       = $this->gambar2->storeAs('images', $imgproduk2);
        } else {
            $img2 = null;
        }
        if($this->gambar3){
            $imgproduk3 = time().'.'.$numtextrand.$this->gambar3->extension();
            $img3 = $this->gambar3->storeAs('images', $imgproduk3);
        } else {
            $img3 = null;
        }

        $produk = Produk::create([
            'nama_produk' => $this->nama_produk,
            'harga'       => $this->harga,
            'stok'        => $this->stok,
            'deskripsi'   => $this->deskripsi,
            'gambar1'     => $this->gambar1->storeAs('images', $imgproduk1),
            'gambar2'     => $img2,
            'gambar3'     => $img3,
            'status'      => 'aktif',
        ]);

        // get id produk last
        $produkid = $produk->id;

        // insert bahan produk 1-6
        if($this->bahan_id1){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id1,
                'jumlah'    => $this->jumlah1,
            ]);
        }
        if($this->bahan_id2){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id2,
                'jumlah'    => $this->jumlah2,
            ]);
        }
        if($this->bahan_id3){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id3,
                'jumlah'    => $this->jumlah3,
            ]);
        }
        if($this->bahan_id4){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id4,
                'jumlah'    => $this->jumlah4,
            ]);
        }
        if($this->bahan_id5){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id5,
                'jumlah'    => $this->jumlah5,
            ]);
        }
        if($this->bahan_id6){
            $bahanproduk = BahanProduk::create([
                'produk_id' => $produkid,
                'bahan_id'  => $this->bahan_id6,
                'jumlah'    => $this->jumlah6,
            ]);
        }

        $this->bahan = [];
        $this->resetInput();
        session()->flash('message', 'Produk berhasil ditambahkan');
    }

    public function update(){
        $randomtype = rand(1, 10000000000000);
        $this->validate([
            'nama_produk' => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'deskripsi'   => 'required',
        ]);

        if($this->gambar4){
            $imgproduk1 = time().'.'.$randomtype.$this->gambar4->extension();
            $img1       = $this->gambar4->storeAs('images', $imgproduk1);
        }else{
            $img1 = $this->produk->gambar1 ?? null;
        }

        if($this->gambar5){
            $imgproduk2 = time().'.'.$randomtype.$this->gambar5->extension();
            $img3       = $this->gambar5->storeAs('images', $imgproduk2);
        }else{
            $img3 = $this->produk->gambar2 ?? null;
        }

        if($this->gambar6){
            $imgproduk3 = time().'.'.$randomtype.$this->gambar6->extension();
            $img4       = $this->gambar6->storeAs('images', $imgproduk3);
        }else{
            $img4 = $this->produk->gambar3 ?? null;
        }

        $this->produk = Produk::find($this->produk_id);

        $this->produk->update([
            'nama_produk' => $this->nama_produk,
            'harga'       => $this->harga,
            'stok'        => $this->stok,
            'deskripsi'   => $this->deskripsi,
            'gambar1'     => $img1,
            'gambar2'     => $img3,
            'gambar3'     => $img4,
            'status'      => 'aktif',
        ]);

        $this->resetInput();
        session()->flash('message', 'Produk berhasil diupdate');
    }

    public function delete($id){
        $produk = Produk::find($id);
        $produk->delete();
        session()->flash('message', 'Produk berhasil dihapus');
    }
}
