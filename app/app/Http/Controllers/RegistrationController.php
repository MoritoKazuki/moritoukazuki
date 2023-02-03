<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected function validator(array $data)
{
    return Validator::make($data, [
        'login_id' => ['required', new alpha_num_check(), 'max:20','unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}
protected function create(array $data)
{
    return User::create([
        'login_id' => $data['login_id'],
        'email' => $data['email'],
        
    ]);
}
}
