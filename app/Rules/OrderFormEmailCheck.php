<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OrderFormEmailCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    private function searchForField($name, $array) {
        foreach ($array as $key => $val) {
            if ($val['field'] === $name) {
                return true;
            }
        }
        return false;
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
        return $this->searchForField('email', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your form needs an email field.';
    }
}
