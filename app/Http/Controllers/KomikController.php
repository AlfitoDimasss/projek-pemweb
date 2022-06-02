<?php

namespace App\Http\Controllers;

use App\Models\komik;
use App\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KomikController extends Controller
{
        public function index(Request $request)
        {
            $data = [
                'komiks' => komik::all()
            ];
            if ($request!=null) {
                $titleSearch = $request->input('search');
                $data['komiks'] = komik::query()->where('title','LIKE',"%{$titleSearch}%")->get();
            }
            return view('halaman-utama', $data);
            
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
        $inputKomik->genre_id = $request->input('genre_id');
        $inputKomik->price = $request->input('price');
        $inputKomik->rate = $request->input('rate');
        $inputKomik->cover = 'defaultimg.jpg';
        if ($cover!=null) {
            $inputKomik->cover = $cover->getClientOriginalName();
            $tujuan_upload = 'img/';
            $cover->move($tujuan_upload, $cover->getClientOriginalName());
        }
        

        $inputKomik->save();
        return redirect('/admin')->with('success', 'Komik berhasil ditambahkan');
    }

    public function storeEdit(Request $request)
    {
        $id = $request->input('id');
        if ($request->file('cover') != null) {
            $cover = $request->file('cover');
            $namaCover = $cover->getClientOriginalName();
            $tujuan_upload = 'img/';
            $cover->move($tujuan_upload, $cover->getClientOriginalName());
        } else {
            $namaCover = $request->input('old-cover');
        }

        $data = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'synopsis' => $request->input('synopsis'),
            'cover' => $namaCover,
            'genre_id' => $request->input('genre_id'),
            'price' => $request->input('price'),
            'rate' => $request->input('rate')
        ];
        komik::where('id', $id)->update($data);
        return redirect('/admin')->with('success', 'Komik berhasil diedit');
    }

    public function destroy($id)
    {
        komik::destroy($id);
        return redirect('/admin')->with('success', 'Komik berhasil dihapus');
    }

    public function edit($id)
    {
        $data = [
            "komik" => komik::where('id', $id)->first(),
            'genres' => genre::all()
        ];
        return view('halaman-admin-editKomik', $data);
    }
}
