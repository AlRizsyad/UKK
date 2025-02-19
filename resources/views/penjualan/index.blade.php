@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Penjualan</h1>
                    <a href="{{ route('penjualan.create') }}" class="btn btn-success">Tambah Data Penjualan</a>
                </div>
                <form action="{{ route('penjualan.index') }}" method="GET" class="d-flex mb-3">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama barang"
                        value="{{ request()->search }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Transaksi</th>
                            <th>Waktu Transaksi</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Nama Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjualans as $penjualan)
                            <tr>
                                <td>{{ $penjualan->id }}</td>
                                <td><a href="{{ route('penjualan.show', $penjualan->id) }}" class="text-decoration-none">
                                        {{ $penjualan->barang->nama_barang }}
                                    </a></td>
                                <td>{{ $penjualan->created_at }}</td>
                                <td>{{ $penjualan->created_at->diffForHumans() }}</td>
                                <td>{{ $penjualan->jumlah }}</td>
                                <td>{{ $penjualan->barang->harga }}</td>
                                <td>{{ $penjualan->jumlah * $penjualan->barang->harga }}</td>
                                <td>{{ $penjualan->user->name }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-center">
                                {{ $penjualans->links('pagination::bootstrap-4') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection