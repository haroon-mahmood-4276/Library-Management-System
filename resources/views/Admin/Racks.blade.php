@extends('Shared.Layout')

@section('PageTitle', 'Racks List')


@section('content')
    @php
    $SrNo = 0;
    @endphp
    <div class="container my-4 text-center">

        @if (session('Msg'))
            <div class="alert alert-{{ session('Msg.MsgType') }} alert-dismissible fade show" role="alert">
                <strong>{{ session('Msg.MsgD') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </strong>
            </div>
            {{ Session::forget('Msg') }}
        @endif

        <div class="table-responsive-md">
            <table class="table table-hover">

                <thead>
                    <tr class="bg-UNi">
                        <th scope="col">#</th>
                        <th scope="col">Rack Name</th>
                        <th scope="col" style="width: 10%;" class="text-center"><a href=" #" id="AddRack"><i
                                    class="fas fa-plus" style="color: white" aria-hidden="true"></i></a>
                        </th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    @if ($ErrMsg)
                        <tr>
                            <td colspan="3">{{ $ErrMsg }}</td>
                        </tr>
                    @else
                        @foreach ($Racks as $RacksRow)
                            <tr>
                                <td>{{ ++$SrNo }}</td>
                                <td>{{ $RacksRow->Rack_Name }}</td>
                                <td class="link text-center">
                                    <form method="post" action="{{ url('/admin/racks/delete') }}/{{ $RacksRow->Rack_ID }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger PDelete"><i class="far fa-trash-alt"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{ View::make('Modals.AddRack') }}
@endsection
