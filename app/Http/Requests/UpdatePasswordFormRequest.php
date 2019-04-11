<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Brian2694\Toastr\Facades\Toastr;

class UpdatePasswordFormRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:6', 'max:60', 'confirmed']
        ];
        
    }
    
    public function attributes()
    {
        return [
            'old_password' => 'senha',
            'password' => 'nova senha',
        ];
    }

    public function messages()
    {
        return [
            'confirmed' => 'As senhas não coincidem.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::warning($message);
        }
        throw (new ValidationException($validator))
        ->errorBag($this->errorBag)
        ->redirectTo($this->getRedirectUrl());

    }
}