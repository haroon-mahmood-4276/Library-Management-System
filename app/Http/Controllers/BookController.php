<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rack;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('books.index', ['Books' => $bookData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $racksData = Rack::all();
        return view('books.create', ['Racks' => $racksData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Book = new Book;
        $Book->rack_id = $request->cbRacks;
        $Book->title = $request->txtBookTitle;
        $Book->author = $request->txtBookAuthor;
        $Book->published_year = date("Y", strtotime($request->txtBookPublishedYear));

        if ($Book->save()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully saved.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not saved.'
            ]);
        }

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rack = Rack::find($id);

        return view('racks.show', ['Rack' => $rack]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookData = Book::find($id);
        $racksData = Rack::all();
        return view('books.edit', ['Book' => $bookData, 'Rack' => $racksData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Book = Book::find($id);
        $Book->rack_id = $request->cbRacks;
        $Book->title = $request->txtBookTitle;
        $Book->author = $request->txtBookAuthor;
        $Book->published_year = date("Y", strtotime($request->txtBookPublishedYear));

        if ($Book->save()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully saved.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not saved.'
            ]);
        }

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Book = Book::find($id);

        if ($Book->delete()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully deleted.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not deleted.'
            ]);
        }

        return redirect('books');
    }
}
