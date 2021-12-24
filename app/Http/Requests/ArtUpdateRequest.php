<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed email
 */
class ArtUpdateRequest extends FormRequest
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
                'description' => $this->string_255,
                'price' => $this->string_255,
                'quantity' => $this->string_255,
                'technique' => $this->not_required_string_2_255,
                'equipment' => $this->not_required_string_2_255,
                'support' => $this->not_required_string_2_255,
        ];
    }
}
