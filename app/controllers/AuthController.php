<?php 

class AuthController extends \BaseController {

    public function getLogin()
    {
        return View::make('pages.login');
    }

    public function postLogin()
    {

    }

    public function getLogout()
    {

    }

    public function getRegistration()
    {
        return View::make('pages.registration');
    }

    public function postRegistration()
    {

    }
}