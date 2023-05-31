<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function getProfile($id)
    {
        $profile = User::where('id', $id)->where('role_id', 2)->first();
        return view('customer.profile', compact('profile'));
    }
}
