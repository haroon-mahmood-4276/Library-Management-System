@extends('shared.layout')

@section('PageTitle', 'Add New Rack')


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
                <h4 class="modal-title mr-auto">Add Racks</h4>
            </div>

            <form method="POST" action="{{ URL::to('racks'.) }}">
                @csrf


                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="txtRackName">Rack Name</label>
                                <input type="text" class="form-control" id="txtRackName" name="txtRackName"
                                    placeholder="Rack Name" value="" maxlength="50" required>
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
