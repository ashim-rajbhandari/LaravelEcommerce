<?php

namespace App\Http\Requests;
use Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUs extends FormRequest
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
            'name' => 'required',
            'subject' => 'required',
            'email' => Rule::requiredIf(!Auth::user()),
            'message' => 'required'
        ];
    }
    
    public function data()
    {
        if(Auth::user()){
        return [
            'name' => $this->input('name'),
            'email'  => Auth::user()->email,
            'subject' => $this->input('subject'),
            'message'  => $this->input('message')
        ];}
        else{
            return [
                'name' => $this->input('name'),
                'email'  => $this->input('email'),
                'subject' => $this->input('subject'),
                'message'  => $this->input('message')
            ];
        }
    }    
}
