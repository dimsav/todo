<?php

App::error(function(\Dimsav\Todo\Exceptions\UnauthorizedUserException $e)
{
    if (Request::ajax())
    {
        return Response::make('Unauthorized', 401);
    }
    else
    {
        return Redirect::route('login');
    }
});