<?php

namespace App\Http\Controllers;

use App\Models\LMSUser;
use App\Models\LMSBooks;
use App\Models\LMSRacks;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(Request $Req)
    {
        $Data = LMSUser::select('User_Email AS ID', 'User_Password', 'User_FirstName AS FirstName', 'User_LastName AS LastName')->where(['User_Email' => strtolower($Req->txtUserID), 'User_Role' => 'User'])->first();
        if (!$Data  || !Hash::check($Req->txtPassword, $Data->User_Password)) {
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
        $Books = LMSBooks::select('Book_ID', 'Book_Title', 'Book_Author', 'Book_PublisheYear');

        $Books = $Books->addSelect([
            'RackName' => LMSRacks::select('Rack_Name')->whereColumn('Rack_ID', '=', 'lms_books.Book_RackID')
        ])->orderBy('RackName')->get();



        if ($Books->isEmpty()) {
            return view('User.Books', ['ErrMsg' => 'No Books Available']);
        } else {
            // return $Books;
            return view('User.Books', ['Books' => $Books, 'ErrMsg' => '']);
        }
    }

    public function SearchBooks(Request $Req)
    {
        // return $Req->input();
        $Books = LMSBooks::select('Book_ID', 'Book_Title', 'Book_Author', 'Book_PublisheYear');
        $Books = $Books->addSelect([
            'RackName' => LMSRacks::select('Rack_Name')->whereColumn('Rack_ID', '=', 'lms_books.Book_RackID')
        ])->where($Req->cbConstraints, 'LIKE', '%'.$Req->txtSearch.'%')->orderBy('RackName')->get();


        // return $Books;

        if ($Books->isEmpty()) {
            return view('User.Books', ['Books' => '','ErrMsg' => 'No Books Available']);
        } else {
            return view('User.Books', ['Books' => $Books, 'ErrMsg' => '']);
        }
    }
}
