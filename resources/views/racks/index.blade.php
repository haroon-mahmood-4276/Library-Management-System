@extends('shared.layout')

@section('PageTitle', 'Racks List')


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
                        <th scope="col">ID</th>
                        <th scope="col">Rack Name</th>
                        <th scope="col" style="width: 10%;" class="text-center"><a href="{{ URL::to('racks/create' ) }}"><i
                            class="fas fa-plus" style="color: white"></i></a>
                </th>
                    </tr>
                </thead>

                <tbody id="myTable">
                        @foreach ($Racks as $RacksRow)
                            <tr>
                                <td class="align-middle">{{ $RacksRow->id }}</td>
                                <td class="align-middle">{{ $RacksRow->name }}</td>
                                <td class="link text-center align-middle">
                                    <a class="btn btn-UNi float-left" href="{{ URL::to('racks/' . $RacksRow->id . '/edit') }}"><i class="fas fa-pen-fancy"></i></a>
                                    <form method="POST" action="{{ URL::to('racks/' . $RacksRow->id) }}">
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
