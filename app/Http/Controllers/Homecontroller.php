<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\slider;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
  function index()
  {
    $productDiscount = Product::orderby('discount','desc')->take(5)->get();
    $productByed = Product::orderby('byed','desc')->take(5)->get();
    $producViseted= Product::orderby('viseted','desc')->take(5)->get();
    $slider = slider::all();
    return view('shop.index', ['productDiscount' => $productDiscount,'productByed' => $productByed,'producViseted'=>$producViseted,"slider"=>$slider]);
  }
}
