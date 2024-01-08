<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
           
                'type' => 'required',
                'room_num' => 'required',
                'contact' => 'required',
                'region_id' => 'required',
                'branch_id' => 'required',
                'price'=>'required',

            
        ];
    }
    public function messages()
    {
        return [
            'type.required' => 'هذا الحقل مطلوب !',
            'room_num.required' => 'هذا الحقل مطلوب !',
            'contact.required' => 'هذا الحقل مطلوب !',
            'region_id.required' => 'هذا الحقل مطلوب !',
            'branch_id.required' => ' هذا الحقل مطلوب !',
            'price.required'=>'هذا الحقل مطلوب !'
        ];
    }
}
