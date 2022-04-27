<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function hot()
   {

       return view("hot");
   }
   public function index()
   {
    $products= Product::all();
    return view('welcome', compact('products'));
   }
   public function all()
   {
    $products= Product::all();
       return view('complete_products', compact('products'));
   }
}
