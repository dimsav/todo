<?php 

class AuthController extends \BaseController {

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
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true))
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
        // Todo
        $user = new \Dimsav\Todo\Models\User();
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        Auth::login($user);
    }
}