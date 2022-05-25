<?php

namespace App\Http\Controllers;

use App\Models\komik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KomikController extends Controller
{
    public function index()
    {
        if (Session::has('user_id')) {
            $data = [
                'komiks' => komik::all()
            ];
            return view('halaman-utama', $data);
        }
        return redirect('/login');
    }

    public function detail($id)
    {
        if (Session::has('user_id')) {
            $data = [
                'komik' => komik::where('id', $id)->first()
            ];
            return view('halaman-detail-komik', $data);
        }
        return redirect('/login');
    }
}
