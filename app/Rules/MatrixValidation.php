<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatrixValidation implements Rule
{

    protected $column;

    protected $row;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($column, $row)
    {
        $this->column   = $column;
        $this->row      = $row;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(count($value) != $this->row) return false;

        foreach ($value as $val) {

            if(count($val) != $this->column) return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Column or row is not equal to the defined size.';
    }
}
