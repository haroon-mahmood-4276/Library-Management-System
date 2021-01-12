@extends('shared.layout')

@section('PageTitle', 'Books List')


@section('content')
    <div class="container my-4 text-center">

        @if (session('Msg'))
            <div class="alert alert-{{ session('Msg.Type') }} alert-dismissible fade show" role="alert">
                <strong>{{ session('Msg.Text') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </strong>
            </div>

        @endif

        <div class="table-responsive-md">
            <table class="table table-hover">

                <thead>
                    <tr class="bg-UNi">
                        <th scope="col">Book ID</th>
                        <th scope="col">Rack Name</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Published Year</th>
                        <th scope="col" style="width: 10%;" class="text-center"><a href="{{ URL::to('books/create') }}"><i
                                    class="fas fa-plus" style="color: white"></i></a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Books as $BooksRow)
                        <tr>
                            <td class="align-middle">{{ $BooksRow->id }}</td>
                            <td class="align-middle">{{ $BooksRow->rack_name }}</td>
                            <td class="align-middle">{{ $BooksRow->title }}</td>
                            <td class="align-middle">{{ $BooksRow->author }}</td>
                            <td class="align-middle">{{ $BooksRow->published_year }}</td>
                            <td class="link text-center align-middle">
                                <a class="btn btn-UNi float-left"
                                    href="{{ URL::to('books/' . $BooksRow->id . '/edit') }}"><i
                                        class="fas fa-pen-fancy"></i></a>
                                <form method="POST" action="{{ URL::to('books/' . $BooksRow->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger float-right"><i class="far fa-trash-alt"></i></button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
