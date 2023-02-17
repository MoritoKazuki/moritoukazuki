<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function accountData() {
        return view('accounts/account');
    }

    public function accountEditForm() {
        return view('accounts/account_edit');
    }

    public function accountEdit() {
        // 
    }
}
