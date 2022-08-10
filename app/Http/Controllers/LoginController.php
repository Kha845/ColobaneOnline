<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }



   public function logout()
   {
    Auth::logout();
    return redirect()->route('login');
   }



   public function existEmail(){
    //on définit toujour pour pouvoir récupérer des ddonnées
    $email = $this->request->input('email');

    $user = User::where('email', $email)
                ->first();
    $response="";
    ($user) ? $response = "exist" : $response = "not_exist";
    return response()->json([
        'response'=>$response
    ]);
}
    public function activationCode($token)
    {
        $user = User::where('activation_token', $token)->first();

        if(!$user)
        {
            return redirect()->route('login')->with('danger','This token doesn\'t match any user! ');

        }
        if($this->request->isMethod('post'))
        {
            //récupére moi l'utilisateur dont le token est passé dans l'url

            //ce code d'activativation est le code qui se trouve dans la base de donné
            $code = $user->activation_code;
            //ce code d'activation est le code saisie dans l'input par l'utilisateur
            $activation_code = $this->request->input('activation-code');

           if($activation_code != $code)
           {

             return back()->with([
                'danger'=>'This activation code is invalid!',
                'activation_code'=>$activation_code
            ]);

           }else{
                DB::table('users')
                    ->where('id',$user->id)
                    ->update([
                        'is_verified'=>1,
                        'activation_code'=>'',
                        'activation_token'=>'',
                        'email_verified_at'=> new \DateTimeImmutable,
                        'updated_at'=>new \DateTimeImmutable
                    ]);

                return redirect()->route('login')->with('success','Your e-mail has been verified');
           }
        }
        return view('auth.activation_code',['token'=>$token]);
    }
/**
 * vérifier  si l'utilisateur a déja activé son compte
 * avant d'etre authentifié
 */

    public function userChecker()
    {
       $activation_token = Auth::user()->activation_token;
       $is_verified = Auth::user()->is_verified;

       if($is_verified != 1){
             Auth::logout();

            return redirect()->route('app_activation_code',['token' => $activation_token])
                            ->with('warning','Your account is not activate yet,
                             please check your mail-box and
                             activate your account or resend the confirmation message.');

       }else{

           return redirect()->route('app_dashboard');
       }
    }
    public function resendActivationCode($token)
    {
        $user = User::where('activation_token', $token)->first();
        $email=$user->email;
        $name=$user->name;
        $activation_token=$user->activation_token;
        $activation_code=$user->activation_code;

        $emailSend = new EmailService;
        $subject = 'Activate your Account';

        $emailSend->sendEmail($subject,$email,$name,true,$activation_code,$activation_token);

        return redirect()->route('app_activation_code',['token'=>$token])
                        ->with('success','You have just resend the new activation code.');
    }
    public function activationAccountLink($token)
    {
       $user = User::where('activation_token',$token)->first();
       if(!$user)

       {
                return redirect()->route('login')->with('danger','This token doesn\'t match any user');
       }
       else{

            DB::table('users')
                ->where('id',$user->id)
                ->update([
                    'is_verified'=>1,
                    'activation_code'=>'',
                    'activation_token'=>'',
                    'email_verified_at'=> new \DateTimeImmutable,
                    'updated_at'=>new \DateTimeImmutable
        ]);

             return redirect()->route('login')->with('success','Your e-mail has been verified');
        }
    }
    public function activationAccountChangeEmail($token)
    {
        $user=User::where('activation_token',$token)->first();


       if($this->request->isMethod('post')){

        $new_email = $this->request->input('new-email');

        $user_existe = User::where('email',$new_email)->first();
            if($user_existe){

                return back()->with([
                    'danger'=> 'This address email is already used! Please entre another email address',
                    'new_email'=> $new_email
                ]);

            }else{
                DB::table('users')
                   ->where('id',$user->id)
                   ->update([
                        'email'=>$new_email,
                        'updated_at'=>new \DateTimeImmutable
                   ]
                );
                $activation_code=$user->activation_code;
                $activation_token=$user->activation_token;
                $name=$user->name;
                $email=$user->email;

                $emailSend = new EmailService;
                $subject = 'Activate your Account';
                $emailSend->sendEmail($subject,$email,$name,true,$activation_code,$activation_token);

                return redirect()->route('app_activation_account_change_email',['token'=>$token])
                                ->with('success','You have just resend the new activation code.');

            }
       }else
       {

       }
        return view('auth.activation_account_change_email',['token'=>$token]);
    }
    public function forgotPassword()
    {
     if($this->request->isMethod('post'))
     {
        $email=$this->request->input('email-send');
        $user = DB::table('users')
                    ->where('email',$email)->first();
        if($user)
        {
            $full_name = $user->name;
            //on va générer un token pour la réinitialisation du mot de passe de l'utilisateur
            $activation_token = md5(uniqid()).$email.sha1($email);

            $emailresetpassword = new EmailService;
            $subject = "Reset your password";
            $emailresetpassword->resetPassword($subject,$email,$full_name,true,$activation_token);
        }
        else{
            //back signifie retourne moi en arriere
            $message='The email your entered does not exist';
            return back()->withErrors(['email-error' => $message])
                         ->with('old-email',$email)
                         ->with('danger',$message);

        }
     }

        return view('auth.forgot_password');
    }

}
