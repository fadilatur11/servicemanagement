<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketPostRequest extends FormRequest
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
            'project' => 'required|max:80',
            'user_id' => 'required',
            'subject' => 'required|max:60',
            'category_id' => 'required',
            'department_id' => 'required',
            'send_to' => 'required',
            'level' => 'required',
            'url' => 'required',
            'description' => 'required',
            'file' => 'required',
        ];
    }
}
