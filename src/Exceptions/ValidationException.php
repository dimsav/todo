<?php namespace Dimsav\Todo\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class ValidationException extends Exception {

    protected $errors;

    public function __construct( $errors = null, $message = null, $code = 0, Exception $previous = null )
    {
        $this->setErrors( $errors );
        parent::__construct( $message, $code, $previous );
    }

    protected function setErrors( $errors )
    {
        if ( is_string( $errors ) )
        {
            $errors = ['error' => $errors];
        }

        if ( is_array( $errors ) )
        {
            $errors = new MessageBag( $errors );
        }

        $this->errors = $errors;
    }

    /**
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

}