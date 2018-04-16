<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsingCaptchaController extends Controller
{
    public function myCaptcha()
    {
        return view('my-captcha');
    }

    public function myCaptchaPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.captcha' => 'Invalid captcha code.'
        ]);

        dd("You did it :)");
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
