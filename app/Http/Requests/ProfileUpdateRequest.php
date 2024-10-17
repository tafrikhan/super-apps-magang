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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'internship_start' => ['required', 'date'],
            'internship_end' => ['required', 'date', 'after_or_equal:internship_start'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // max size in kilobytes
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'internship_end.after_or_equal' => 'The internship end date must be a date after or equal to the start date.',
            'profile_photo.image' => 'The profile photo must be an image.',
            'profile_photo.mimes' => 'The profile photo must be a file of type: jpeg, png, jpg, gif, svg.',
            'profile_photo.max' => 'The profile photo may not be greater than 2 MB.',
        ];
    }
}
