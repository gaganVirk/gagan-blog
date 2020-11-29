<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Auth;
//use Illuminate\Support\Facades\Auth;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
        // return $user->hasPermissionTo('CRUD posts');
        
        return Auth::user()->can('CRUD posts');
        

        // if (auth()->user()->roles->has('admin') {
        //     // User is admin therefore can edit
        //         return true;
        // } elseif (auth()->user()->posts->contacts($this)) {
        //     // User owns this post, so can edit
        //     return true;
        // }
        // None of the conditions above were met.
        //return false;
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
