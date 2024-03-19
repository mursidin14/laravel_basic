<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        $name = $request->input('name');
        return "hello " . $name;
    } 
    
    public function helloFirst(Request $request):string
    {
        $firstName = $request->input('name.first');
        return "hello " . $firstName;
    }

    public function helloInput(Request $request):string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function arrayInput(Request $request):string
    {
        $names = $request->input('products.*.name');
        return json_decode($names);
    }

    public function inputType(Request $request):string
    {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birthDate = $request->date('birth_date: ', 'Y-m-d');

        return json_encode([
            'name' => $name,
            'married' => $married,
            'birth_date' => $birthDate->format('Y-m-d') ?? "Null"
        ]);
    }
}
