<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Rack;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Login(Request $Req)
    {
        $Data = User::select('email', 'password', 'first_name', 'last_name')->where(['email' => strtolower($Req->txtUserID), 'user_role' => 'Admin'])->first();
        //  return $Data;
        if (!$Data  || !Hash::check($Req->txtPassword, $Data->password)) {
            $Req->session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Email Address or Passowrd is incorrect.'
            ]);
            return redirect('/admin/login');
        } else {
            $Data['DataType'] = 'Admin';
            $Req->session()->put('Data', $Data);
            return redirect('/admin/dashboard');
        }
    }

    public function Dashboard()
    {
        $racksCount = Rack::count();
        $booksCount = Book::count();
        return view('admin.dashboard', ['RacksCount' => $racksCount, 'BooksCount' => $booksCount]);
    }
}
