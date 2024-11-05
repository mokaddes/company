<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getIndex() {
        return View::make('categories.index')
            ->with('categories', Category::all());
    }

}
