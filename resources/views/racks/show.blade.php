@extends('shared.layout')

@section('PageTitle', 'Rack')


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

       
    </div>
@endsection
