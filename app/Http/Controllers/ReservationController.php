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
                'reservations' => reservation::where('user_id', Session::get('user_id'))->get()
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
    
    public function adminShow($userid)
    {
        if (Session::has('user_id')) {
            $data = [
                "reservations" => reservation::where('user_id', $userid)->get()
            ];
            return view('halaman-reservasi', $data);
        }
        return redirect('/login');
    }

    public function create(Request $req)
    {
        if (Session::has('user_id')) {
            $date = strtotime($req->post('date'));
            if ($req->post('durasi') == 14) {
                $date = strtotime("+14 day", $date);
            } else {
                $date = strtotime("+7 day", $date);
            }
            $date = date('Y-m-d', $date);
            $data = [
                'user_id' => $_POST['user_id'],
                'komik_id' => $_POST['komik_id'],
                'quantity' => $_POST['quantity'],
                'borrow_date' => $_POST['date'],
                'return_date' => $date
            ];
            reservation::create($data);
            return redirect('/reservations');
        }
        return redirect('/login');
    }

}
