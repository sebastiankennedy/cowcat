<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class ActionCreateForm extends Request
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
            'group'       => 'required',
            'name'        => 'required',
            'action'      => 'required|unique:actions,action,' . $this->get('id'),
            'description' => 'required',
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
            'group.required'       => '操作名称不能为空',
            'name.required'        => '操作分组不能为空',
            'action.required'      => '操作描述不能为空',
            'description.required' => '操作标识不能为空',
            'action.unique'        => '操作标识必须唯一',
        ];
    }
}
