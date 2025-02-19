@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Penjualan</h1>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_barang" class="form-label">Pilih Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Proses Transaksi</button>
            </form>

        </div>
    </div>
</div>
@endsection
