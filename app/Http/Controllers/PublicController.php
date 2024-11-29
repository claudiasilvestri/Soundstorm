<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class PublicController extends Controller 
{
public function homepage(){
    $tracks = Track::OrderBy('created_at', 'DESC')
    ->take(8)
    ->get();

    return view('welcome', compact('tracks'));

}
}