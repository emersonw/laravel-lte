<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
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
            'password' => 'required',
            'new_password' => 'required|same:new_password',
            'confirm_password' => 'required|same:new_password', 
        ];
        
    }
    
    public function attributes()
    {
        return [
            'password' => 'senha',
            'new_password' => 'nova senha',
            'confirm_password' => 'confirme a senha', 
        ];
    }

    public function messages()
    {
        return [
            'same' => 'As senhas não coincidem.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::warning($message);
        }

        return $validator->errors()->all();
    }
}