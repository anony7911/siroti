<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;

class UserPesanan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $pesanans, $detail_pesanans;
    public $perPage = 15;
    public $user_id, $kode_pesanan, $total_harga, $status_pesanan, $produk_id, $jumlah, $total;
    public $nama_produk, $harga;
    public $detail_pesanans1 = [];
    public function render()
    {
        $this->pesanans = Pesanan::where('user_id', Auth::user()->id??0)
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage);
        $this->detail_pesanans = DetailPesanan::join('produks', 'detail_pesanans.produk_id', '=', 'produks.id')
            ->where('detail_pesanans.kode_pesanan', $this->kode_pesanan)
            ->select('detail_pesanans.*', 'produks.nama_produk', 'produks.harga')
            ->get();
        return view('livewire.user-pesanan', [
            'pesanans' => $this->pesanans,
            'detail_pesanans' => $this->detail_pesanans,
            'detail_pesanans1' => $this->detail_pesanans1,
        ])->extends('layouts.user')->section('content');
    }

    public function detail($id)
    {
        $this->pesanan_id = $id;
        $this->detail_pesanans1 = DetailPesanan::join('produks', 'detail_pesanans.produk_id', '=', 'produks.id')
            ->join('pesanans', 'detail_pesanans.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.id', $this->pesanan_id)
            ->select('detail_pesanans.*', 'produks.nama_produk', 'produks.harga')
            ->get();
        $i = 1;
        foreach ($this->detail_pesanans1 as $detail) {
            $this->nama_produk[$i] = $detail->nama_produk;
            $this->jumlah[$i] = $detail->jumlah;
            $this->harga[$i] = $detail->harga;
            $this->total_harga[$i] = $detail->total_harga;
            $i++;
        }

    }
}
