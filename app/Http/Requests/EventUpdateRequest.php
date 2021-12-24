<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed email
 */
class EventUpdateRequest extends FormRequest
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
            'name' => $this->string_255,
            'date' => 'date',
            'description' => $this->string_255
        ];
    }
}
