<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'url' => route('product.index'),
                'name' => 'Products',
            ]
        ];
        return view('components.dashboard.product.pages.index', compact('breadcrumbs'));
    }

    public function show(Request $request)
    {
        $apiUrl = "https://fakestoreapi.com/products/{$request->id}";

        $response = Http::get($apiUrl);

        // dd($response->json());

        if ($response->successful()) {
            $product = $response->json();
            
            return view('components.dashboard.product.pages.show', compact('product'));
        } else {
            // Handle the error
            return response()->json(['error' => 'Unable to fetch product data'], 500);
        }
    }
}
