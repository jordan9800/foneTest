<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'type' => ['required', 'in:Marketing,Invoices,System'],
            'global' => ['required'],
            'user' => ['required_if:global,No'],
            'expiry_date' => ['required', 'date_format:Y-m-d', 'after:today'],
        ];
    }
}
