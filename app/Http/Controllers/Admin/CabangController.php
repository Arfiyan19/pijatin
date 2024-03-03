<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabang;

class CabangController extends Controller
{
    public function index()
    {
        $data = Cabang::paginate(5);
        return view('backend.cabang.index', compact('data'));
    }
}
