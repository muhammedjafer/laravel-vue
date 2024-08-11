@extends('layouts.app')
@section('content')
<div class="text-gray-600 my-2 fs-3 mx-5">
    <a href="{{ url()->previous() }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
    </a>
</div>
<div class="bg-white rounded shadow-md relative border border-primary mx-4">
    <div class="p-4">
        <div class="mb-6">
            <div class="text-gray-600 my-2 fs-3">
                <label for="product_title" class="text-info font-bold">Title:</label>
                {{ $product['title'] }}
            </div>
        </div>

        <div>
            <div class="text-gray-600 my-2 fs-4">
                <label for="product_category" class="text-info font-bold">Category:</label>
                {{ $product['category'] }}
            </div>
            <div class="text-gray-600 my-2 fs-4">
                <label for="product_price" class="text-info font-bold">Price:</label>
                {{ $product['price'] }}
            </div>
            <div class="text-gray-600 my-2">
                <label for="product_rating_rate" class="text-info">Average rating:</label>
                {{ $product['rating']['rate'] }}
            </div>
            <div class="text-gray-600 my-2">
                <label for="product_rating_count" class="text-info">Rating count:</label>
                {{ $product['rating']['count'] }}
            </div>
            <img src="{{ $product['image'] }}" alt="{{ "image_{$product['id']}" }}" class="my-4" width="200" height="200">
        </div>

        <label for="product_description" class="text-info font-bold fs-5">Description:</label><br>
        {{ $product['description'] }}

        <div class="flex flex-col lg:flex-row justify-between mb-4">
    </div>
</div>
@endsection

