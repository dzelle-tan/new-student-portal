<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index(): View
    {
        return view('layouts.information.classes', [
            //
        ]);
    }
}
