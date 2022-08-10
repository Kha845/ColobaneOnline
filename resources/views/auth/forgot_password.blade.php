@extends('base')

@section('title')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">
               Forgot password
            </h1>
            <p class="text-center text-muted mb-3">
                Please entre your email address.We'l send you a link to resend you password
            </p>
            <form method="POST" action="{{route('app_forgotpassword')}}">
                @csrf
                {{--include les messages d'alerts---}}
                @include('alerts.alert-message')
                <label for="email-send" class="form-label">Email</label>
                <input type="email" name="email-send" id="email-send" class="form-control @error('email-error') is-invalid @enderror @error('email-success') is-valid @enderror" value="@if(Session::has('old-email')) {{ Session::get('old-email')}} @endif" required placeholder="Please entre your email address">
                 <div class="d-grid gap-2 mt-4 mb-5">
                    <button class="btn btn-primary mt-3" type="submit">Resend password</button>
                </div>
                <p class="text-center text-muted">Back to login <a href="{{route('login')}}">login</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
