@extends('shared.layout')

@section('PageTitle', 'Racks List')


@section('content')

    <div class="container my-4">
        <div class="row my-3">
            <div class="col-lg-12">
                <form action="/user/books/search" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" id="txtSearch" name="txtSearch" placeholder="What are you loocking for...">
                        <select class="custom-select" id="cbConstraints" name="cbConstraints">
                            <option value="title">Book Title</option>
                            <option value="author">Book Author</option>
                            <option value="published_year">Published Year</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-UNi" type="button">Search</button>
                            <a href="/user/books"><button class="btn btn-UNi" type="button">Reset</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('Msg'))
            <div class="alert alert-{{ session('Msg.Type') }} alert-dismissible fade show" role="alert">
                <strong>{{ session('Msg.Text') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </strong>
            </div>
            {{ Session::forget('Msg') }}
        @endif

        <div>
            @if ($Books != '')
                <div class="row">
                    @foreach ($Books as $BooksRow)
                        <div class="col-lg-3">
                            <div class="card card-animation">
                                <div class="card-body">
                                    <h2 class='card-title text-center'>{{ $BooksRow->title }}</h2>
                                    <p class="card-text">Author: {{ $BooksRow->author }}</p>
                                    <p class="card-text">Published Year: {{ $BooksRow->published_year }}</p>
                                    <p class="card-text">Rack: {{ $BooksRow->rack_name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endsection
