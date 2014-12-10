<?php

App::error(function(\Dimsav\Todo\Exceptions\UnauthorizedUserException $e)
{
    if (Request::ajax())
    {
        return Response::make('Session has expired. Please refresh the page and try again.', 401);
    }
    else
    {
        return Redirect::route('login');
    }
});

App::error(function(\Dimsav\Todo\Exceptions\ValidationException $e)
{
    if (Request::ajax())
    {
        return Response::make(implode(' ', $e->getErrors()->all()), 400);
    }
});