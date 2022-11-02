<?php
declare(strict_types=1);

namespace Kami\Cocktail\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CocktailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'instructions' => 'required',
            'ingredients' => 'array',
            'images' => 'array',
            'ingredients.*.amount' => 'numeric',
            'ingredients.*.units' => 'required_with:ingredients.*.amount',
            'ingredients.*.optional' => 'boolean',
        ];
    }
}