<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function edit(User $user)
{
    return view('profile.edit', compact('user'));
}

}

