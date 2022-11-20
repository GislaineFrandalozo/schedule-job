<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class WebController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Home');
    }
    public function profile(Request $request)
    {
        return Inertia::render('Profile');
    }
    public function teste(Request $request)
    {
        //dd($request->input('name'));
        $user = Auth::user();
        $token = $user->createToken($request->input('name'), ['app-user']);
        dd(['token' => $token->plainTextToken]);
            // redirect('/profile');
    }
}
