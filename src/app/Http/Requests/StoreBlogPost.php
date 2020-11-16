<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if (auth()->user()->roles->has('admin') {
        //     // User is admin therefore can edit
        //         return true;
        // } elseif (auth()->user()->posts->contacts($this)) {
        //     // User owns this post, so can edit
        //     return true;
        // }

        // None of the conditions above were met.
        //return false;

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
            'category_id' => 'required',
            'category' => 'required',
            'title' => 'required',
            'body' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'A category is required',
        ];
    }
}
