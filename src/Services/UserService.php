<?php namespace Dimsav\Todo\Services;

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
     * @param array $attributes
     * @return User
     * @throws ValidationException
     */
    public function register(array $attributes)
    {
        $this->validator->validate($attributes);

        $user = new User;
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();
        return $user;
    }

}