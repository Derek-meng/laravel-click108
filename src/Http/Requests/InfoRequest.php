<?php

namespace Jubilee\Click108\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->get('id');
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'integer|required'
        ];
    }

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
