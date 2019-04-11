<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Validation\Rule;
use Auth;

class UpdateProfileFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:10', 'max:50'],
            'username' => ['required', 'string', 'min:4', 'max:25', Rule::unique('users')->ignore(Auth::user()->id)],            
            'email' => ['required', 'string', 'email', 'max:60', Rule::unique('users')->ignore(Auth::user()->id)]
        ];
        
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'username' => 'usuário',
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
