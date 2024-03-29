<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'civility' => ['required', 'in:M,Mme,Mlle'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        }

        $user->forceFill([
            'civility' => $input['civility'],
            'name' => $input['name'],
            'surname' => $input['surname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'nationality' => $input['nationality'],
            'birth_day' => $input['birth_day'],
        ])->save();

        notify()->success('your account have been updated successful.', $user->fullName);
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
