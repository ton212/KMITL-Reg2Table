<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function stepOne()
    {
        return view('wizard.step1');
    }
}
