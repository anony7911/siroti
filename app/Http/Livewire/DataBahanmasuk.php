<?php

namespace App\Http\Livewire;

use App\Models\Stok;
use App\Models\Bahan;
use Livewire\Component;
use Livewire\WithPagination;

class DataBahanmasuk extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $perPage = 10;

    protected $updatesQueryString = ['search' => ['except' => ''], 'perPage' => ['except' => 10]];

    public $bahan_id, $jumlah, $total_harga, $supplier, $tanggal_beli, $tanggal_expired, $stok_id, $nama_bahan;

    protected $stoks, $bahans;
    public function render()
    {
        $this->stoks = Stok::join('bahans', 'stoks.bahan_id', '=', 'bahans.id')
            ->select('stoks.*', 'bahans.nama_bahan')
            ->where('bahan_id', 'like', '%'.$this->search.'%')
            ->orWhere('supplier', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage);
        $this->bahans = Bahan::all();
        return view('livewire.data-bahanmasuk',[
            'stoks' => $this->stoks,
            'bahans' => $this->bahans,
        ])->extends('layouts.app')->section('content');
    }

    public function resetInput()
    {
        $this->bahan_id = null;
        $this->jumlah = null;
        $this->total_harga = null;
        $this->supplier = null;
        $this->tanggal_beli = null;
        $this->tanggal_expired = null;
    }

    public function stokId($id)
    {
        $this->stok_id = $id;
        $stok = Stok::find($id);
        $this->bahan_id = $stok->bahan_id;
        $this->jumlah = $stok->jumlah;
        $this->total_harga = $stok->total_harga;
        $this->supplier = $stok->supplier;
        $this->tanggal_beli = $stok->tanggal_beli;
        $this->tanggal_expired = $stok->tanggal_expired;
    }

    public function store()
    {
        $this->validate([
            'bahan_id' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'supplier' => 'required',
            'tanggal_beli' => 'required',
            'tanggal_expired' => 'required',
        ]);

        Stok::create([
            'bahan_id' => $this->bahan_id,
            'jumlah' => $this->jumlah,
            'total_harga' => $this->total_harga,
            'supplier' => $this->supplier,
            'tanggal_beli' => $this->tanggal_beli,
            'tanggal_expired' => $this->tanggal_expired,
        ]);

        // update stok bahan dijumlah dengan jumlah bahan masuk
        Bahan::where('id', $this->bahan_id)->increment('stok', $this->jumlah);

        $this->resetInput();
        session()->flash('message', 'Data Berhasil Ditambahkan');
    }

    public function update()
    {
        $this->validate([
            'bahan_id' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'supplier' => 'required',
            'tanggal_beli' => 'required',
            'tanggal_expired' => 'required',
        ]);

        if ($this->stok_id) {
            $stok = Stok::find($this->stok_id);
            $stok->update([
                'bahan_id' => $this->bahan_id,
                'jumlah' => $this->jumlah,
                'total_harga' => $this->total_harga,
                'supplier' => $this->supplier,
                'tanggal_beli' => $this->tanggal_beli,
                'tanggal_expired' => $this->tanggal_expired,
            ]);
            $this->resetInput();
            session()->flash('message', 'Data Berhasil Diubah');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $stok = Stok::find($id);
            $stok->delete();
            session()->flash('message', 'Data Berhasil Dihapus');
        }
    }
}
