@extends('layouts.app')

@section('title', 'Идилия Плюс - Интернет-магазин напольных покрытий')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Идеальные напольные покрытия для вашего дома</h1>
                <p class="lead mb-4">Широкий выбор качественных материалов от ведущих производителей.</p>
                <a href="{{ route('catalog') }}" class="btn btn-primary btn-lg">Смотреть каталог</a>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400" alt="Напольные покрытия" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Рекомендуемые товары</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ $product->main_image ?: 'https://via.placeholder.com/300x250' }}" 
                         class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small">{{ $product->category->name }}</p>
                        <div class="mt-auto">
                            <div class="price mb-2">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>
                            <a href="{{ route('catalog.show', $product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
