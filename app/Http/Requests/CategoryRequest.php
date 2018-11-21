<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //检测是否为用户   也可以用true
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//                           有无参数
        $id=$this->route('category')?$this->route('category')->id:null;
//        dd($id);//只有添加栏目 用到
        return [
            //     属性：必填|唯一：  表单名       字段      id
            'title'=>'required|unique:categories,title,' . $id,
            'icon'=>'required'
        ];
    }
    public  function messages()
    {
        return [
            'title.required'=>'请输入栏目名称',
            'title.unique'=>'栏目已存在',
            'icon.required'=>'请选择栏目图标'
        ];
    }
}
