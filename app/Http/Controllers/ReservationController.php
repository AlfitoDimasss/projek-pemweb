<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index()
    {
        if (Session::has('user_id')) {
            $data = [
                'reservations' => reservation::where('user_id', 1)->get()
            ];
            return view('halaman-reservasi', $data);
        }
        return redirect('/login');
    }

    public function show($id)
    {
        if (Session::has('user_id')) {
            $data = [
                "res" => reservation::where('id', $id)->where('user_id', 1)->get()->first()
            ];
            return view('halaman-invoice', $data);
        }
        return redirect('/login');
    }

    public function create()
    {
        if (Session::has('user_id')) {
            $data = [
                'user_id' => $_POST['user_id'],
                'komik_id' => $_POST['komik_id'],
                'quantity' => $_POST['quantity'],
                'borrow_date' => $_POST['borrow_date'],
                'return_date' => $_POST['borrow_date']
            ];
            reservation::create($data);
            return redirect('/reservations');
        }
        return redirect('/login');
    }
}
