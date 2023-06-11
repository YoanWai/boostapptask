@props(['cartItems', 'totalPriceAfterDiscount'])
@php
    // Calculate total price after discount
    $totalPriceAfterDiscount = 0;
    foreach ($cartItems as $cartItem) {
        $discount = $cartItem->item->discount;
        $price = $cartItem->item->price;
        $discountPrice = $price - $price * ($discount / 100);
        $totalPriceAfterDiscount += round($discountPrice * $cartItem->quantity);
    }
@endphp

<div id="sidebar" class="col-3 collapse collapse-horizontal show">
    <div id="sidebar-nav" class="text-sm-start min-vh-100 d-flex flex-column">
        <div class="d-flex py-3 px-2 border-bottom nav nav-pills">
            <li class="nav-item ms-auto">סל מוצרים</li>
            <button data-bs-target="#sidebar" data-bs-toggle="collapse" type="button" class="btn-close text-start"
                aria-label="Close"></button>
        </div>
        <div class="d-flex py-3 px-2 border-bottom nav nav-pills border-bottom border-end">
            <div class="nav-item ms-2">יחידות</div>
            <div class="nav-item">שם המוצר</div>
            <div class="nav-item me-auto">סיכום</div>
        </div>
        <div class="d-flex flex-column flex-grow-1 overflow-auto border-end">
            <!-- Cart Items -->
            @foreach ($cartItems as $cartItem)
                <x-cart-item :cartItem="$cartItem" />
            @endforeach
        </div>
        <div class="d-flex py-3 px-2 border-end border-top">
            <div class="nav-item ms-2">סה"כ</div>
            <div class="nav-item me-auto">{{ $totalPriceAfterDiscount }}₪
            </div>
        </div>
    </div>
</div>
