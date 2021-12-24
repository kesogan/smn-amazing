<?php

namespace App\Traits;

trait RequestTrait
{
    private $string_510 = 'string|max:510';
    private $string_255 = 'string|max:255';
    private $required = 'required';
    private $required_email = 'required|string|min:2|max:255|email';
    private $required_string = 'required|string';
    private $required_number = 'required|string';
    private $required_image = 'required|image|max:2048';
    private $required_numeric_0_5 = 'required|numeric|min:0|max:5';
    private $required_string_2_7 = 'required|string|min:2|max:7';
    private $required_string_5_5 = 'required|string|min:5|max:5';
    private $required_string_2_30 = 'required|string|min:2|max:30';
    private $required_string_8_255 = 'required|string|min:8|max:255';
    private $required_string_1_10 = 'required|string|min:1|max:10';
    private $required_string_9_9 = 'required|string|min:9|max:9';
    private $required_string_2_255 = 'required|string|min:2|max:255';
    private $required_string_2_510 = 'required|string|min:2|max:510';


    private $not_required_email = 'string|min:2|max:255|email';
    private $not_required_string = 'string';
    private $not_required_number = 'string';
    private $not_required_image = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    private $not_required_numeric_0_5 = 'numeric|min:0|max:5';
    private $not_required_string_2_7 = 'string|min:2|max:7';
    private $not_required_string_5_5 = 'string|min:5|max:5';
    private $not_required_string_2_30 = 'string|min:2|max:30';
    private $not_required_string_8_255 = 'string|min:8|max:255';
    private $not_required_string_1_10 = 'string|min:1|max:10';
    private $not_required_string_9_9 = 'string|min:9|max:9';
    private $not_required_string_2_255 = 'string|min:2|max:255';
    private $not_required_string_2_510 = 'string|min:2|max:510';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
