<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TourPackageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:225', 
            'location' => 'required|max:225', 
            'about' => 'required', 
            'featured_ticket'=> 'required|max:225',
            'parking' => 'required|max:225',
            'documentation' => 'required|max:225',
            'guide_tours' => 'required|max:225', 
            'safety' => 'required|max:225', 
            'foods' => 'required|max:225', 
            'duration' => 'required|max:225',
            'type' => 'required|max:225',
            'price' => 'required|integer',
        ];
    }
}
