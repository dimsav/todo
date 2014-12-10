<?php namespace Dimsav\Todo\Validators;

class RegisterUserValidator extends Validator {

    public $rules = [
        'email' => ['required', 'email', 'unique:users,email,{id}'],
        'password' => ['required', 'min:4', 'confirmed'],
        'password_confirmation' => ['required']
    ];
}