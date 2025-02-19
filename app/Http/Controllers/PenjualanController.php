<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function index(Request $request)
    {
        $query = Penjualan::with('barang', 'with');
        if ($request->has('search')) {
            $query->whereHas('barang', function ($query) use ($request) {
                $query->where('nama_barang', 'like', '%' . $request->search . '%');
            });
        }

        $penjualans = $query->paginate(10);
        return view('penjualan.index', compact('penjualans'));
    }


    public function create()
    {
        //
        $barangs = Barang::all();
        return view('penjualan.create', compact('barangs'));
    }


    public function store(Request $request)
    {
        //

        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $barangs = Barang::findOrFail($request->id_barang);

        if ($barangs->stok < $request->jumlah) {
            return redirect()->back()->with(['error' => 'stok tidak mencukupi']);
        }

        $barangs->decrement('stok', $request->jumlah);

        Penjualan::create([
            'id_user' => auth()->id(),
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil dicatat']);
    }


    public function show($id)
    {
        //
        $penjualan = Penjualan::with(['barang', 'user'])->findOrFail($id);
        return view('penjualan.show', compact('penjualan'));
    }

}
