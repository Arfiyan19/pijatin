<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiWilayahController extends Controller
{
    public function getProvinsi()
    {
        try {
            $response = Http::withHeaders([])->get('http://bayupras141.github.io/api-wilayah-indonesia/api/provinces.json');

            $status = $response->status();
            $data = $response->json();

            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json($data);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data provinsi'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // getKota
    public function getKota($id)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/regencies/{$id}.json");

            $status = $response->status();
            $data = $response->json();

            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json($data);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data kota'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // getKecamatan
    public function getKecamatan($id)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/districts/{$id}.json");

            $status = $response->status();
            $data = $response->json();

            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json($data);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data districts'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getKelurahan($id)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/villages/{$id}.json");

            $status = $response->status();
            $data = $response->json();

            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json($data);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data districts'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
