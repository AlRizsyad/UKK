@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detail Penjualan</h1>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID Penjualan</th>
                    <td>{{ $penjualan->id }}</td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td>{{ $penjualan->barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td>{{ $penjualan->created_at->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $penjualan->jumlah }}</td>
                </tr>
                <tr>
                    <th>Harga Satuan</th>
                    <td>{{ number_format($penjualan->barang->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>{{ number_format($penjualan->jumlah * $penjualan->barang->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Nama Kasir</th>
                    <td>{{ optional($penjualan->user)->name ?? 'Tidak Diketahui' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
