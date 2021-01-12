<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Rack;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(Request $Req)
    {
        $Data = User::select('email', 'password', 'first_name', 'last_name')->where(['email' => strtolower($Req->txtUserID), 'user_role' => 'User'])->first();
        if (!$Data  || !Hash::check($Req->txtPassword, $Data->password)) {
            $Req->session()->put('Msg', [
                'MsgType' => 'danger',
                'MsgD' => 'Email Address or Passowrd is incorrect.'
            ]);
            return redirect('/user/login');
        } else {
            $Data['DataType'] = 'User';
            $Req->session()->put('Data', $Data);
            return redirect('/user/books');
        }
    }

    public function Books()
    {
        $bookData = Book::select('id', 'title', 'author', 'published_year');
        $bookData = $bookData->addSelect([
            'rack_name' => Rack::select('name')->whereColumn('id', '=', 'books.rack_id')
        ])->orderBy('rack_name')->get();

        $booksCount = Rack::count();

        if ($booksCount <= 0) {
            session()->put('Msg', [
                'Type' => 'warning',
                'Text' => 'No Books Available'
            ]);
        }
        return view('user.books', ['Books' => $bookData]);
    }

    public function SearchBooks(Request $Req)
    {
        $bookData = Book::select('id', 'title', 'author', 'published_year');
        $bookData = $bookData->addSelect([
            'rack_name' => Rack::select('name')->whereColumn('id', '=', 'books.rack_id')
        ])->where($Req->cbConstraints, 'LIKE', '%' . $Req->txtSearch . '%')->orderBy('rack_name')->get();

        return view('user.books', ['Books' => $bookData]);
    }
}
