<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateOwner extends Command
{
    protected $signature = 'akimboh:create-owner';

    protected $description = 'Create the AkimBOH owner account';

    public function handle(): int
    {
        if (User::query()->exists()) {
            $this->error('An account already exists.');

            return self::FAILURE;
        }

        $this->info('AKIMBOH - OWNER ACCOUNT SETUP');

        $name = trim((string) $this->ask('Your name'));

        $email = strtolower(trim(
            (string) $this->ask('Your email address')
        ));

        $password = (string) $this->secret(
            'Choose a password (minimum 12 characters)'
        );

        $confirmation = (string) $this->secret(
            'Confirm your password'
        );

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $confirmation,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(12)->mixedCase()->numbers(),
            ],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Owner account created successfully!');

        return self::SUCCESS;
    }
}
