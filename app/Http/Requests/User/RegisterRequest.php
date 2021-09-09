<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'parent_id' => 'required|numeric|max:99999999',
            'name' => 'required|max:32'
        ];
    }

    public function attributes()
    {
        $attributes = [
            'parent_id' => '上级ID',
            'name' => '用户名称',
        ];
        return $attributes;
    }
}
