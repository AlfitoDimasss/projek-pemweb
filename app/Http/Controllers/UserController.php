<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\komik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function cekUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = user::where('email', $email)->first();
        if ($user->password == $password) {
            Session::put('user_id', $user->id);
            if ($user->user_type == 'admin') {
                return redirect('/admin');
            }
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function indexAdmin()
    {
        $data = [
            'komiks' => komik::all()
        ];
        return view('halaman-admin', $data);
    }

    // Session index admin belum jalan
}
