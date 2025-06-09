@extends('layouts.app')

@section('title', 'Каталог - Идилия Плюс')

@section('content')
<div class="container py-4">
    <h1>Каталог товаров</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100">
                <img src="{{ $product->main_image ?: 'https://via.placeholder.com/300x250' }}" 
                     class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->category->name }}</p>
                    <div class="price">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>
                    <a href="{{ route('catalog.show', $product) }}" class="btn btn-primary btn-sm mt-2">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    {{ $products->links() }}
</div>
@endsection
