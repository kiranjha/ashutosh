<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showValidateForm()
    {
        return view('pages.form');
    }

    //Store Validated Form
    public function storeValidateForm(Request $request)
    {
        return redirect()->back()->with('success', 'Submitted');
    }
}
