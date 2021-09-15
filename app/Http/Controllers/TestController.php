<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class TestController extends Controller
{
    public function index()
    {
        # code...

        return Paciente::all();
    }
}
