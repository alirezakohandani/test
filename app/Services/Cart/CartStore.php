<?php

namespace App\Services\Cart;

use Illuminate\Http\Request;

interface CartStore
{
    public function store(Request $request);
    public function show();
    public function destroy(Request $request);
    public function clear();

}