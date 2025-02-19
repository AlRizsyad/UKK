@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Daftar Barang</h1>
                    <a href="{{ route('barang.create') }}" class="btn btn-sm btn-success"> Tambah Barang</a>
                </div>
                <form action="{{ route('barang.index') }}" method="GET" class="d-flex mb-3">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama barang"
                        value="{{ request()->search }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->harga }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning"> Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data barang</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection