<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed email
 */
class EventRequest extends FormRequest
{
    use RequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required|unique:event',
                'date' => 'required|date',
                'description' => $this->required_string_2_510,
        ];
    }
}
