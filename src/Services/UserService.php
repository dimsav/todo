<?php namespace Dimsav\Todo\Services;

use Hash;
use Input;
use Dimsav\Todo\Exceptions\ValidationException;
use Dimsav\Todo\Models\User;
use Dimsav\Todo\Validators\RegisterUserValidator;

class UserService {

    /**
     * @var RegisterUserValidator
     */
    private $validator;

    public function __construct(RegisterUserValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return User
     * @throws ValidationException
     */
    public function register()
    {
        $this->validator->validate(Input::all());

        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return $user;
    }

}