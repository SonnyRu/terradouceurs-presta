<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Déchiffrer les données
        $user->name = decrypt($user->name);
        $user->first_name = decrypt($user->first_name);
        $user->email = $user->email;
        $user->phone_number = decrypt($user->phone_number);
        $user->exploitation_name = decrypt($user->exploitation_name);
        $user->siret_number = decrypt($user->siret_number);

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Remplacer les données de l'utilisateur par les données validées du formulaire
        $user->fill($request->validated());

        // Crypter les nouvelles données
        $encryptedData = [
            'name' => Crypt::encrypt($request->input('name')),
            'first_name' => Crypt::encrypt($request->input('first_name')),
            'phone_number' => Crypt::encrypt($request->input('phone_number')),
            'exploitation_name' => Crypt::encrypt($request->input('exploitation_name')),
            'siret_number' => Crypt::encrypt($request->input('siret_number')),
        ];

        // Vérifier si l'e-mail a été modifié
        if ($user->isDirty('email')) {
            // Réinitialiser la vérification de l'e-mail si l'adresse e-mail a été modifiée
            $user->email_verified_at = null;
        }

        // Mettre à jour les données de l'utilisateur avec les données cryptées
        $user->update($encryptedData);

        // Rediriger vers la page d'édition du profil avec un message de succès
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
