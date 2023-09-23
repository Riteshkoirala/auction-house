<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'lot_id'=>'required',
            'name_of_artist' => 'required',
            'year_work_produced'=>'required',
            'subject_classification'=>'required',
            'description'=>'required',
            'estimated_price'=>'required',
            'category'=>'required',
            'image_name'=>'required',
            'drawing_medium' => 'nullable|required_if:category,Drawings',
            'framed' => 'nullable|required_if:category,Drawings,Paintings',
            'dimension' => 'nullable|required_if:category,Drawings,Paintings,Photographic Images,Sculptures,Carvings',
            'painting_medium' => 'nullable|required_if:category,Paintings',
            'image_type' => 'nullable|required_if:category,Photographic Images',
            'material_used' => 'nullable|required_if:category,Sculptures,Carvings',
            'weight' => 'nullable|required_if:category,Sculptures,Carvings',
        ];
    }
}
