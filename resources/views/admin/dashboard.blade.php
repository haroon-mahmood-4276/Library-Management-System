@extends('shared.layout')

@section('PageTitle', 'Dashboard')


@section('content')
    <div class="container mb-5 text-center">
        <!-- UMT Numbers -->
        <div class="my-4" style="color: #064473;">
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
            <div>
                <div class="card-deck">

                    <div class="card card-animation">
                        <span class="badge badge-pill badge-primary"
                            style="position: absolute; background-color: #224172; top: 5px; right: 5px;"><a href=" #"
                                id="mySchoolBtn"><i class="m-1 fas fa-plus" style="color: white" data-target="#myModel"
                                    aria-hidden="true"></i></a></span>

                        <div class="card-body">
                            <h2 class='card-title'>{{ $RacksCount }}</h2>
                            <p class="card-text">Rack(s)</p>
                        </div>

                    </div>

                    <div class="card card-animation">
                        <span class="badge badge-pill badge-primary "
                            style="position: absolute; background-color: #224172; top: 5px; right: 5px;"><a href=" #"
                                id="myProgramBtn"><i class="m-1 fa fa-plus" style="color: white"
                                    aria-hidden="true"></i></a></span>

                        <div class="card-body">
                            <h2 class='card-title'>{{ $BooksCount }}</h2>
                            <p class="card-text">Book(s)</p>
                        </div>
                    </div>

                </div><br>
            </div>
        </div>
    </div>

@endsection
