<?php

namespace App\Domain\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'isbn' => ['required', 'string'],
            'authors' => ['required', 'array'],
            'country' => ['required', 'string'],
            'number_of_pages' => ['required', 'numeric'],
            'publisher' => ['required', 'string'],
            'release_date' => ['required', 'date'],
        ];
    }
}
