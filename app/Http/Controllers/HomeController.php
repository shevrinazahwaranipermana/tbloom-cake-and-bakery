<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Pastikan ini mengembalikan view 'home', bukan 'welcome'
        return view('home');
    }
}