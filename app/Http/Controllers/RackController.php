<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rack;
use Illuminate\Support\Facades\Session;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $racksData = Rack::all();
        $racksCount = Rack::count();

        if ($racksCount <= 0) {
            session()->put('Msg', [
                'Type' => 'warning',
                'Text' => 'No Racks Available'
            ]);
        }
        return view('racks.index', ['Racks' => $racksData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('racks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rack = new Rack;
        $rack->name = $request->txtRackName;

        if ($rack->save()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully saved.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not saved'
            ]);
        }

        return redirect('racks');
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
        $rack = Rack::find($id);

        return view('racks.edit', ['Rack' => $rack]);
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
        $rack = Rack::find($id);
        $rack->name = $request->txtRackName;

        if ($rack->save()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully saved.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not saved'
            ]);
        }

        return redirect('racks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rack = Rack::find($id);

        if ($rack->delete()) {
            session()->flash('Msg', [
                'Type' => 'success',
                'Text' => 'Data is successfully deleted.'
            ]);
        } else {
            session()->flash('Msg', [
                'Type' => 'danger',
                'Text' => 'Data could not delete'
            ]);
        }

        return redirect('racks');
    }
}
