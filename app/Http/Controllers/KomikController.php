<?php

namespace App\Http\Controllers;

use App\Models\komik;
use App\Models\genre;
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


    public function create()
    {
        return view('halaman-admin-addKomik', [
            'genres' => genre::all()
        ]);
    }

    public function store(Request $request)
    {
        $cover = $request->file('cover');

        // new komik to store request
        $inputKomik = new komik;

        $inputKomik->title = $request->input('title');
        $inputKomik->author = $request->input('author');
        $inputKomik->synopsis = $request->input('synopsis');
        $inputKomik->cover = $cover->getClientOriginalName();
        $inputKomik->genre_id = $request->input('genre_id');
        $inputKomik->price = $request->input('price');
        $inputKomik->rate = $request->input('rate');

        $tujuan_upload = 'img/';
        $cover->move($tujuan_upload, $cover->getClientOriginalName());

        $inputKomik->save();
        return redirect('/admin')->with('success', 'Komik berhasil ditambahkan');
    }

    public function destroy($id)
    {
        komik::destroy($id);
        return redirect('/admin')->with('success', 'Komik berhasil dihapus');
    }
}
