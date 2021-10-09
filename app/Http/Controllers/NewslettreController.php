<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newslettre;

class NewslettreController extends Controller
{
    function __invoke(Newslettre $newslettre)
    {
        request()->validate([
            'email' => 'required|email'
        ]);


        try {

            $newslettre->subscribe(request('email'));
        } catch (\Exception $e) {
            return redirect('/')->with('success', 'Something went wrong ! Try again.');
        }

        return redirect('/')->with('success', 'You are now signed up for our newslettre !');
    }
}
