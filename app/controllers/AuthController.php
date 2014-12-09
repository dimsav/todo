<?php
use Dimsav\Todo\Exceptions\ValidationException;
use Dimsav\Todo\Services\UserService;

class AuthController extends \BaseController {
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getLogin()
    {
        if (Auth::check())
        {
            return Redirect::route('home');
        }
        return View::make('pages.login');
    }

    public function postLogin()
    {
        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')], true))
        {
            return Redirect::route('home');
        }
        Session::flash('error_messages', ["Wrong credentials, please try again."]);
        return Redirect::to(URL::current());
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

    public function getRegistration()
    {
        if (Auth::check())
        {
            return Redirect::route('home');
        }
        return View::make('pages.registration');
    }

    public function postRegistration()
    {
        try {
            $user = $this->userService->register(Input::all());
        }
        catch (ValidationException $e)
        {
            return Redirect::route('registration')->withInput()->withErrors($e->getErrors());
        }

        Auth::login($user);
    }
}