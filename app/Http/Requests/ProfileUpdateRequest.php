<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['sometimes', 'nullable', 'digits:10', new PhoneNumber],
            'notification_switch' => ['required', 'in:0,1'],
            'password' => ['sometimes', 'nullable', 'confirmed', 'min:6'],
        ];
    }
}
