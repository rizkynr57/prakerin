<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{

    public function JoinBarangMasuk()
    {
        $barangMasuk = DB::table('barang_masuks')
        // ->join('suppliers', 'barang_masuks.id_supplier', '=', 'barang_masuk.id_supplier')
        ->join('barangs', 'barang_masuks.id_barang', '=', 'barang_masuk.id_barang')
        ->select('barangs.nama_barang as barang', 'barang_masuks.jumlah_pemasukan', 'barang_masuks.tgl_masuk')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Masuk',
            'data' => $barangMasuk,
        ], 200);
    }

    public function JoinBarangKeluar()
    {
        $barangKeluar = DB::table('barang_keluars')
        // ->join('customers', 'barang_keluars.id_customer', 'barang_keluar.id_customer')
        ->join('barangs', 'barang_keluars.id_barang', '=', 'barang_keluar.id_barang')
        ->select('barangs.nama_barang as barang', 'barang_keluars.jumlah_pengiriman', 'barang_keluars.harga_satuan', 'barang_keluars.tujuan', 'barang_keluars.tgl_pengirimam')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Keluar',
            'data' => $barangKeluar,
        ], 200);
    }
}