<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class QrLoginController extends Controller
{
    // public function showQrReader()
    // {
    //     return Inertia::render('Auth/QRLogin');
    // }

    public function Qrlogin(Request $request)
    {
        $result = false;
        $user = User::where('uuid', $request->uuid)->first();

        if (!is_null($user)) {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } else {
            return Inertia::render('Auth/QRLogin');
        }
    }
}
