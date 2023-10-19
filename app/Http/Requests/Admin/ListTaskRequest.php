<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListTaskRequest extends FormRequest
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
        'user_id' =>'required',
        'name' =>'required|max:225',
        'deskripsi' =>'string|max:225|nullable',
        'status' =>'required|max:225',
        'gambar_task' =>'mimes:jpeg,jpg,png|required|max:10000',
        ];
    }   
}
