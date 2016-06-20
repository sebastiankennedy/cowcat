<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class PermissionCreateForm extends Request
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
            'name'         => 'required',
            'display_name' => 'required',
            'description'  => 'required',
        ];
    }

    /**
     * Get the validation message that apply to the request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => '角色标识不能为空',
            'display_name.required' => '角色名称不能为空',
            'description.required'  => '角色描述不能为空',
        ];
    }
}
