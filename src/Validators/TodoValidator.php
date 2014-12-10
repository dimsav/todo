<?php namespace Dimsav\Todo\Validators;

class TodoValidator extends Validator {

    public $rules = [
        'finished' => ['required', 'boolean'],
    ];
}