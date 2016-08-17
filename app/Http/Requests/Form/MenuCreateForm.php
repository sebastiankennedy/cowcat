<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class MenuCreateForm extends Request
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
            'name'        => 'required',
            'parent_id'   => 'required',
            'description' => 'required',
            'route'       => 'required|unique:menus,route,' . $this->get('id'),
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
            'name.required'        => '菜单名称不能为空',
            'parent_id.required'   => '父级分类不能为空',
            'description.required' => '菜单描述不能为空',
            'route.required'       => '菜单路由不能为空',
            'route.unique'         => '菜单路由必须唯一',
        ];
    }
}
