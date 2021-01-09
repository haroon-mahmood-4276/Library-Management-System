<?php

namespace App\Http\Controllers;

use App\Models\LMSBooks;
use App\Models\LMSRacks;
use App\Models\LMSUser;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Login(Request $Req)
    {
        $Data = LMSUser::select('User_Email AS ID', 'User_Password', 'User_FirstName AS FirstName', 'User_LastName AS LastName')->where(['User_Email' => strtolower($Req->txtUserID), 'User_Role' => 'Admin'])->first();
        if (!$Data  || !Hash::check($Req->txtPassword, $Data->User_Password)) {
            $Req->session()->put('Msg', [
                'MsgType' => 'danger',
                'MsgD' => 'Email Address or Passowrd is incorrect.'
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
        $RacksCount = LMSRacks::count();
        $BooksCount = LMSBooks::count();
        return view('Admin.Dashboard', ['RacksCount' => $RacksCount, 'BooksCount' => $BooksCount]);
    }

    public function RacksList()
    {
        $Racks = LMSRacks::select('Rack_ID', 'Rack_Name')->get();

        if ($Racks->isEmpty()) {
            return view('Admin.Racks', ['ErrMsg' => 'No Racks Available']);
        } else {
            // return $Racks;
            return view('Admin.Racks', ['Racks' => $Racks, 'ErrMsg' => '']);
        }
    }

    public function Racks()
    {
        return response()->json(LMSRacks::select('Rack_ID', 'Rack_Name')->get());
    }

    public function AddRacks(Request $Req)
    {

        // return $Req->input();
        $Data = LMSBooks::where(['Book_ID' => $Req->txtBookID])->first();
        if ($Data) {
            $Req->session()->put('Msg', [
                'MsgType' => 'info',
                'MsgD' => 'This Rack is already exists.'
            ]);
        } else {

            $LMSRacksData = new LMSRacks();

            $LMSRacksData->Rack_Name = $Req->txtRackName;

            if ($LMSRacksData->save()) {
                $Req->session()->put('Msg', [

                    'MsgType' => 'success',
                    'MsgD' => 'Data is successfully saved.'
                ]);
            } else {
                $Req->session()->put('Msg', [

                    'MsgType' => 'danger',
                    'MsgD' => 'Data could not saved'
                ]);
            }
        }
        return redirect('/admin/books');
    }

    public function DeleteRacks($id)
    {
        try {
            if (LMSRacks::where('Rack_ID', '=', $id)->delete()) {
                session()->put('Msg', [

                    'MsgType' => 'success',
                    'MsgD' => 'Data is successfully deleted.'
                ]);
            } else {
                session()->put('Msg', [

                    'MsgType' => 'danger',
                    'MsgD' => 'Data could deleted because this Rack doesn\'t exists.'
                ]);
            }
            return redirect('/admin/racks');
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function BooksList()
    {
        $Books = LMSBooks::select('Book_ID', 'Book_Title', 'Book_Author', 'Book_PublisheYear');

        $Books = $Books->addSelect([
            'RackName' => LMSRacks::select('Rack_Name')->whereColumn('Rack_ID', '=', 'lms_books.Book_RackID')
        ])->orderBy('RackName')->get();



        if ($Books->isEmpty()) {
            return view('Admin.Books', ['ErrMsg' => 'No Books Available']);
        } else {
            // return $Books;
            return view('Admin.Books', ['Books' => $Books, 'ErrMsg' => '']);
        }
    }

    public function AddBook(Request $Req)
    {

        $Data = LMSBooks::where(['Book_ID' => $Req->txtBookID])->first();
        if ($Data) {
            $Req->session()->put('Msg', [
                'MsgType' => 'info',
                'MsgD' => 'This Book is already exists.'
            ]);
        } else {

            $BooksCount = LMSBooks::where(['Book_RackID' => $Req->cbRacks])->count();

            $LMSBooksData = new LMSBooks;

            $LMSBooksData->Book_RackID = $Req->cbRacks;
            $LMSBooksData->Book_ID = $Req->txtBookID;
            $LMSBooksData->Book_Title = $Req->txtBookTitle;
            $LMSBooksData->Book_Author = $Req->txtBookAuthor;
            $LMSBooksData->Book_PublisheYear = date("Y", strtotime($Req->txtBookPublishedYear));

            if ($LMSBooksData->save()) {
                if($BooksCount > 10){
                    $Req->session()->put('Msg', [
                        'MsgType' => 'warning',
                        'MsgD' => 'Data is successfully saved. But the number of books are greater than 10'
                    ]);
                }
                else{
                    $Req->session()->put('Msg', [
                        'MsgType' => 'success',
                        'MsgD' => 'Data is successfully saved.'
                    ]);
                }

            } else {
                $Req->session()->put('Msg', [

                    'MsgType' => 'danger',
                    'MsgD' => 'Data could saved'
                ]);
            }
        }
        return redirect('/admin/books');
    }

    public function DeleteBooks($id)
    {
        try {
            if (LMSBooks::where('Book_ID', '=', $id)->delete()) {
                session()->put('Msg', [

                    'MsgType' => 'success',
                    'MsgD' => 'Data is successfully deleted.'
                ]);
            } else {
                session()->put('Msg', [

                    'MsgType' => 'danger',
                    'MsgD' => 'Data could deleted because this Book doesn\'t exists.'
                ]);
            }
            return redirect('/admin/books');
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
