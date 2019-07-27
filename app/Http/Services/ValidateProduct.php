<?php
namespace App\Http\Services;

use Illuminate\Http\Request;

class ValidateProduct {
    public function product(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'cat_id' => 'required|numeric',
            'priceCore' => 'required|numeric',
        ]);
    }
}
