@props(['cartItem'])

<div class="card m-2 cartItem-card">
    <div class="card-body">
        <div class="d-flex">
            <div id="first" class="d-flex ms-auto">
                <div class="">{{ $cartItem->quantity }}</div>
                <div class="text-center">
                    <div class="me-3">{{ $cartItem->item->name }}</div>
                    @php
                        $discount = $cartItem->item->discount;
                        $price = $cartItem->item->price;
                        $discountPrice = $price - $price * ($discount / 100);
                        $discountNumber = round($price * ($discount / 100));
                        
                    @endphp
                    <span style="color:rgba(0, 0, 0,0.6); font-size: 10px;">{{ "₪$discountNumber" }}</span>
                    <span style="color:rgba(0, 0, 0,0.3); font-size: 10px;">
                        {{ "$discount% הנחה" }}
                    </span>
                </div>
            </div>
            <div id="second" class="d-flex me-auto">
                <div class="text-center">
                    <div class="ms-2" style="font-size: 10px;">
                        @php
                            $discount = $cartItem->item->discount;
                            $price = $cartItem->item->price;
                            $discountPrice = round($price - $price * ($discount / 100));
                        @endphp
                        ₪{{ $discountPrice }}
                    </div>

                    <div class="ms-2 text-muted text-decoration-line-through" style="font-size: 9px;">
                        ₪{{ $cartItem->item->price }}
                    </div>
                </div>
                <i data-id="{{ $cartItem->id }}" class="fas fa-trash-alt text-danger float-end mt-1"
                    style="cursor: pointer" onclick="deleteCartItem(this, event)"></i>
            </div>
        </div>
    </div>
</div>
