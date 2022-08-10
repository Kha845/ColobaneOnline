@extends('base')

@section('title','change password')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">
               Change password
            </h1>
            <p class="text-center text-muted mb-3">
               Please entre your new password
            </p>
            <form method="POST" action="{{route('app_changePassword',['token'=>$token])}}">
                @csrf
                {{--include les messages d'alerts---}}
                @include('alerts.alert-message')

                <label for="new-password" class="form-label">New password</label>
                <input type="password" name="new-password" id="new-password" class="form-control @error('password-errors') is-invalid @enderror
                 @error('password-success') is-valid @enderror"
                required placeholder="Entre your new password" value="@if(Session::has('danger')){{Session::get('old-new-password')}}@endif">

                <label for="new-password-confirm" class="form-label">New password confirmation</label>
                <input type="password" name="new-password-confirm" id="new-password-confirm" class="form-control
                @error('confirm-password-errors') is-invalid @enderror"
                required placeholder="Confirmation your new password" value="@if(Session::has('danger')){{Session::get('old-new-password-confirmation')}}@endif">

                <div class="d-grid gap-2 mt-4 mb-5">
                    <button class="btn btn-primary mt-3" type="submit">New password</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
