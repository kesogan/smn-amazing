<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'billing_first_name' => $this->required,
                'billing_last_name' => $this->required,
                'billing_address_1' => $this->required,
                'quantity' => $this->required,
                'technique' => $this->required_string_2_255,
                'equipment' => $this->required_string_2_255,
                'support' => $this->required_string_2_255,
                'billing_state' => $this->required,
                'billing_postcode' => $this->required,
                'billing_email' => $this->required,
                'billing_phone' => $this->required,
                'shipping_country' => $this->required,
                'shipping_first_name' => $this->required,
                'shipping_last_name' => $this->required,
                'shipping_address_1' => $this->required,
                'shipping_state' => $this->required,
                'shipping_postcode' => $this->required,
                'shipping_method'=> $this->required,
        ];
    }
}
