<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendTokenMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {
        return  view('dashboard/index');

    }

}