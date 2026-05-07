<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class PurchaseCodeController extends Controller
{
    public function index()
    {
        return view('admin.purchase_code');
    }

    public function store()
    {
        return redirect()->back();
    }
}
