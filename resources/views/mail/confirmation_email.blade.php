<h1>{{ $name}} Please confirm your mail</h1>
<p>

    Please activate your account by copying or pasting the activation code.
    <br> Activation code : {{ $activation_code }}<br>
    or by clicking the following link: <br>
    <a href="{{ route('app_activation_account_link',
    ['token'=>$activation_token])}}" target="_blank">confirm your account </a>
</p>
<p>
    ColobaneOnline team.

</p>
