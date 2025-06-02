<?php

namespace App\Actions\Fortify;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            //email ditambah pada unique:users -> email hrs unik dalam tabel users kolom email
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], 
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate(); //memeriksa apakah data yg diberikan sesuai dengan role yg ditentukan

        //mengecek apakah email yg dimasukan oleh pengguna ada pada tabel siswa di database
        //jika tanpa pentung logikanya jadi -> jika pengguna registrasi dengan menginputkan email yg di table siswa maka blabla
        //jika pakai pentung logikanya jaid -> jika pengguna registrasi TIDAK dengan menginputkan email yg di table siswa maka blabla
        if (!Siswa::where('email', $input['email'])->exists()) {
                                                    //->exist() logikanya -> jika ada, maka mengembalikan true, jika tidak ada ya mengembalikann false
                                                    //jika email sama sekali tidak ada di tabel siswa,
                                                    //maka validationexception akan dilempar lalu pesan kesalahan ditampilkan untuk email
            throw ValidationException::withMessages([
                'email' => 'Email ini tidak terdaftar sebagai siswa'
            ]);
        }


        // return User::create([
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        //tambah role siswa
        $user->assignRole('siswa');

        return $user;
    }
}
