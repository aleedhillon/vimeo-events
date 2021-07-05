<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredParticipantController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register', [
            'isParticipant' => true
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:participants',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $participant = Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('participants')->login($participant);

        return redirect(RouteServiceProvider::PARTICIPANT_HOME);
    }
}
