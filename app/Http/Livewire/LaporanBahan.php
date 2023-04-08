<?php

namespace App\Http\Livewire;

use App\Models\Bahan;
use Livewire\Component;

class LaporanBahan extends Component
{
    protected $bahans;
    public $nama_bahan, $jumlah, $satuan, $harga, $total_harga, $tanggal_awal, $tanggal_akhir;
    public function render()
    {
        $this->bahans = Bahan::all();
        return view('livewire.laporan-bahan', [
            'bahans' => $this->bahans,
        ])->extends('layouts.app')->section('content');
    }

    public function cetak()
    {
        $this->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        $this->bahans = Bahan::whereBetween('created_at', [$this->tanggal_awal, $this->tanggal_akhir])->get();

        // cetak
       $pdf = \PDF::loadView('livewire.pdf-laporan-bahan',['bahans' => $this->bahans])->output();
       return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
       }, date('Y-m-d_H:i:s') . '_laporan_bahan' . '.pdf');
    }
}
