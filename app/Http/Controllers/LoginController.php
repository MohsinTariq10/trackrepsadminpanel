<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public $con;
    public $bucket;

    public function __construct()
    {
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("auth");
    }

    public function login(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('admin');
        }
        return view("login.login");
    }

    public function check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        try {
            //$data = $this->con->table('auth')->where('usrname', $username,'password',$password)->get();//->get("admin::" . $username)->value;
            $data = $this->bucket->get("admin::" . $username)->value;
            $array = json_decode($data, true);
        } catch (\Exception $e) {
            $error = "Incorrect User Name";
            return view("login.login", ['error' => $error]);
        }
        if ($username === $array['username'] && $password === $array['password']) {
            Session::put('username', $username);
            return redirect('/admin');
        } else {
            $error = "Password incorrect";
            return view("login.login", ['error' => $error]);
        }
    }

    public function logout(Request $request)
    {
        Session::forget('username');
        Session::flush();
        return redirect('login');
    }
}