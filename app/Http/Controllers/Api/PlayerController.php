<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    function index()
    {
        return response()->json(['message' => 'Welcome to the Player API']);
    }
}
