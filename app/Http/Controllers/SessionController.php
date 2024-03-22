<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('UserId', 'mursidin');
        $request->session()->put('IsMember', 'true');

        return "Ok";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get('userId', 'guest');
        $isMember = $request->session()->get('isMember', 'false');

        return "user-id: ${userId}, is-member: ${isMember}";
    }
}
