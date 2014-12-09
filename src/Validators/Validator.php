<?php namespace Dimsav\Todo\Validators;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory as IlluminateValidator;
use Dimsav\Todo\Exceptions\ValidationException;

abstract class Validator {

    /**
     * @var IlluminateValidator
     */
    protected $validator;

    /**
     * @var Model
     */
    protected $instance;

    public function __construct( IlluminateValidator $validator )
    {
        $this->validator = $validator;
    }

    public function validate( array $data, array $rules = array(), array $custom_errors = array() )
    {
        if ( empty( $rules ) && ! empty( $this->rules ) && is_array( $this->rules ) )
        {
            // no rules passed to function, use the default rules defined in sub-class
            $rules = $this->rules;
        }

        $validation = $this->validator->make( $data, $rules, $custom_errors );

        if ( $validation->fails() )
        {
            throw new ValidationException( $validation->messages() );
        }

        return true;
    }

}
