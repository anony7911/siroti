<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use App\Models\Keranjang;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;

class UserKeranjang extends Component
{
    protected $keranjangs, $pesanans, $detail_pesanans;
    public $user_id, $produk_id, $jumlah, $total, $total1, $total_harga, $total_harga1;

    public function render()
    {
        // jika user belum login maka akan diarahkan ke halaman login

        $this->keranjangs = Keranjang::join('produks', 'keranjangs.produk_id', '=', 'produks.id')
            ->where('user_id', Auth::user()->id ?? 0)
            ->select('keranjangs.*', 'produks.nama_produk', 'produks.harga')
            ->get();

        return view('livewire.user-keranjang', [
            'keranjangs' => $this->keranjangs,
        ])->extends('layouts.user')->section('content');
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
    }

    public function decrement($id)
    {
        $keranjang = Keranjang::find($id);
        if ($keranjang->jumlah > 1) {
            $keranjang->update([
                'jumlah' => $keranjang->jumlah - 1,
            ]);
        } else {
            $keranjang->delete();
        }
    }

    public function increment($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->update([
            'jumlah' => $keranjang->jumlah + 1,
        ]);
    }

    public function checkout()
    {
        $this->keranjangs = Keranjang::join('produks', 'keranjangs.produk_id', '=', 'produks.id')
            ->where('user_id', Auth::user()->id)
            ->select('keranjangs.*', 'produks.nama_produk', 'produks.harga')
            ->get();

        $this->total = $this->keranjangs->sum(function ($keranjang) {
            return $keranjang->jumlah * $keranjang->harga;
        });

        if ($this->keranjangs == null) {
            session()->flash('message', 'Keranjang masih kosong, silahkan belanja terlebih dahulu');
        } else {
            $kd_pesan = 'pesanan-'.Auth::user()->id.'-'.mt_rand(1, 999);
            $this->pesanans = Pesanan::create([
                'user_id' => Auth::user()->id,
                'kode_pesanan' => $kd_pesan,
                'total_harga1' => $this->total,
                'status_pesanan' => 'menunggu',
            ]);
            foreach ($this->keranjangs as $keranjang) {
                $this->detail_pesanans = DetailPesanan::create([
                    'pesanan_id' => $this->pesanans->id,
                    'produk_id' => $keranjang->produk_id,
                    'jumlah' => $keranjang->jumlah,
                    'total_harga' => $keranjang->jumlah * $keranjang->harga,
                    'kode_pesanan' => $kd_pesan,
                ]);
            }

            $this->keranjangs->each->delete();
            return redirect('/u/pesanan')->with('message', 'Pesanan berhasil dibuat');
        }
    }
}
