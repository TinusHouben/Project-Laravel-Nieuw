<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => ['string', 'max:255'],
        'email' => ['email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
        'birthday' => ['nullable', 'date'],
        'about_me' => ['nullable', 'string', 'max:1000'],
        'profile_picture' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
