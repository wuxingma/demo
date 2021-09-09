<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class IntegralConfigRequest extends FormRequest
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
        $id = request()->get('id', '');
        return [
            'level' => 'required|unique:integral_config,level,'.$id,
            'amount' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        $attributes = [
            'level' => '等级',
            'amount' => '金额',
        ];
        return $attributes;
    }
}
