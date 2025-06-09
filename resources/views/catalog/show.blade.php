@extends('layouts.app')

@section('title', $product->name . ' - Идилия Плюс')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ $product->main_image ?: 'https://via.placeholder.com/600x500' }}" 
                 class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-lg-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Артикул: {{ $product->sku }}</p>
            <div class="price display-6 mb-3">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>
            <p>{{ $product->description }}</p>
            
            @if($product->attributes->count() > 0)
            <h5>Характеристики:</h5>
            <table class="table">
                @foreach($product->attributes as $attribute)
                <tr>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->value }}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
