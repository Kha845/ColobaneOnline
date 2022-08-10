<?php

namespace App\Actions\Fortify;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Services\EmailService;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\User
     */
    public function create(array $input)
    {
        /*
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();*/

         $email = $input['email'];

         $activation_token = md5(uniqid()).$email.sha1($email);

         $activation_code = "";

         $length_code = 5;

         for($i=0;$i<$length_code;$i++){

            $activation_code.=mt_rand(0,9);
         }

        $name = $input['firstname'].' '.$input['lastname'];

        $emailSend = new EmailService;
        $subject = 'Activate your Account';

        $emailSend->sendEmail($subject,$email,$name,true,$activation_code,$activation_token);

        return User::create([
            'name' => $name,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'activation_code' => $activation_code,
            'activation_token' => $activation_token,

        ]);
    }
}
