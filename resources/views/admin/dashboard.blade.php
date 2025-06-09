@extends('layouts.app')

@section('title', 'Панель управления - Идилия Плюс')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Панель управления</h1>
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Товары</h5>
                    <p class="card-text display-6">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Заказы</h5>
                    <p class="card-text display-6">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Пользователи</h5>
                    <p class="card-text display-6">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Продажи</h5>
                    <p class="card-text display-6">{{ number_format($totalSales, 0, ',', ' ') }} ₽</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
