<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class StoreContactPost extends FormRequest
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
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'content' => 'required',
                'h-captcha-response' => 'required',
            ];      
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
                'response' => request()->get('h-captcha-response'),
                'secret' => config('app.hcaptcha'),
            ]);

            if (!$response['success']) {
                $validator->errors()->add('h-captcha-response', 'Something is wrong with your captcha answer!');
            }
        });
    }
}
