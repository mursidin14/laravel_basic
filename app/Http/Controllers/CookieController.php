<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nette\Utils\Json;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response('hello cookie')
                ->cookie('User-Id', 'mursidin', 1000, '/')
                ->cookie('Is-Member', 'true', 1000, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()->json(
            [
                'UserId' => $request->cookie('User-Id', 'guest'),
                'IsMember' => $request->cookie('Is-Member', 'false')
            ]
            );
    }

    public function clearCookie(Request $request): Response
    {
        return response('clear cookie')
               ->withoutCookie('User-Id')
               ->withoutCookie('Is-Member');
    }
}
