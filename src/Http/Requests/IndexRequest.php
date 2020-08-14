<?php

namespace Jubilee\Click108\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->get('page', 1);
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->get('perPage', 10);
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

    /**
     * @return array|string[]
     */
    public function rules(): array
    {
        return [
            'page'    => 'sometimes|required|integer',
            'perPage' => 'sometimes|required|integer',
        ];
    }
}
