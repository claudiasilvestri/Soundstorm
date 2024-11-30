<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class PublicController extends Controller 
{
public function homepage(){
    $track = Track::OrderBy('created_at', 'DESC')
    ->take(4)
    ->get();

    return view('welcome', compact('track'));

}
}