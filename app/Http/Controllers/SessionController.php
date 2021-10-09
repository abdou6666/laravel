<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        // validate request
        // attempt to to athaunticate & log in user 
        // based on provided credentials
        // redirect with sucess msg
        ///ddd($request);

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate(); //session fixation attack
            //redirect with flash message   
            return redirect('/')->With('success', 'Welcome Back!');
        }

        //auth failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your Provided credentials could not be verified.']);
    }
}
