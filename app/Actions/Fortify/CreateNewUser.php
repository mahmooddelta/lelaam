<?php

namespace App\Actions\Fortify;

use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'string', 'min:10', 'max:14', 'unique:users'],
            'phone_verified_at' => ['nullable', 'boolean'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'state' => ['required', 'integer', 'min:0', Rule::exists(State::class, 'id')],
        ])->validate();

        return User::create([
                                'name' => $input['name'],
                                'email' => $input['email'],
                                'password' => Hash::make($input['password']),
                                'phone' => $input['phone'],
                                'phone_verified_at' => $input['phoneVerified'] === true ? now() : null,
                                'state_id' => $input['state'],
                            ]);
    }
}
