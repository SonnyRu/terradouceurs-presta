<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'string', 'max:20'],
            'exploitation_name' => ['required', 'string', 'max:255'],
            'siret_number' => ['required', function ($attribute, $value, $fail) {
                $siret = str_replace(' ', '', $value);
                if (strlen($siret) != 14) {
                    $fail($attribute.' doit contenir exactement 14 chiffres.');
                }
            }],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => encrypt($request->name),
            'first_name' => encrypt($request->first_name),
            'email' => $request->email,
            'phone_number' => encrypt($request->phone_number),
            'exploitation_name' => encrypt($request->exploitation_name),
            'siret_number' => encrypt($request->siret_number),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
