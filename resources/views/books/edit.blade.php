@extends('shared.layout')

@section('PageTitle', 'Edit Book')


@section('content')
    <div class="container my-4">

        @if (session('Msg'))
            <div class="alert alert-{{ session('Msg.Type') }} alert-dismissible fade show" role="alert">
                <strong>{{ session('Msg.Text') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </strong>
            </div>

        @endif
        <div class="card card-animation">
            <div class="card-header bg-UNi">
                <h4 class="modal-title mr-auto">Edit Racks</h4>
            </div>
@php
$selected = "selected"
@endphp
            <form method="POST" action="{{ URL::to('books/' . $Book->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cbRacks">Racks</label>
                                <select name="cbRacks" class="custom-select d-block" id="cbRacks" required>
                                    <option value="0">Select</option>
                                    @foreach ($Rack as $RackRow)
                                        <option value="{{ $RackRow->id }}" {{ $Book->rack_id == $RackRow->id ? $selected : '' }}>
                                            {{ $RackRow->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="txtBookTitle">Book Title</label>
                                <input type="text" class="form-control" id="txtBookTitle" name="txtBookTitle"
                                    placeholder="Book Title" maxlength="50" value="{{ $Book->title }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="txtBookAuthor">Book Author</label>
                                <input type="text" class="form-control" id="txtBookAuthor" name="txtBookAuthor"
                                    placeholder="Book Author" value="{{ $Book->author }}" maxlength="50" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="txtBookPublishedYear">Published Year</label>
                                <input type="date" class="form-control" id="txtBookPublishedYear"
                                    name="txtBookPublishedYear" placeholder="Book Abbrivation" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-UNi text-right">
                    <input type="submit" class="btn btn-UNi" name="submit" value="Save" />
                    <button type="reset" class="btn btn-danger ">Reset</button>
                </div>
            </form>
        </div>
    </div>

@endsection
