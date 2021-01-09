@extends('Shared.Layout')

@section('PageTitle', 'User Login')


@section('content')
    <div class="container  my-5 py-3" style=" background-color: #224172; color: white; border-radius: 10px;">

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

        <form action="/user/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="InputEmail">Email Address</label>
                <input type="email" class="form-control" id="txtUserID" name="txtUserID" maxlength="70" placeholder="Email Address" required>
              </div>
            <div class="form-group">

                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password"
                    minlength="6" required>

            </div>
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-UNi" id="btnLogin"><i class="fas fa-sign-in-alt"
                        style="color: white;"></i>
                </button>
            </div>
        </form>
    </div>

@endsection
