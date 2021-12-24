<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed email
 */
class ArtRequest extends FormRequest
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
                'name' => 'required|unique:art',
                'description' => $this->required,
                'price' => $this->required,
                'quantity' => $this->required
        ];
    }
}
