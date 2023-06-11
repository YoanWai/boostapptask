<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Show Main Page
    public function items_menu()
    {
        $items = Item::all();
        return view('items-menu', ['items' => $items]);
    }

    // Show Favorite Page
    public function favorites_menu()
    {
        $items = Item::where('favorite', true)->get();
        return view('favorites-menu', compact('items'));
    }

    // Toggle Item Favorite
    public function toggle_favorite(Request $request)
    {
        $item = Item::find($request->id);
        $item->favorite = !$item->favorite;
        $item->save();
        return $item;
    }

    // Add Item To Cart
    public function add_to_cart(Request $request)
    {
        $item = Item::find($request->id);
        $cartItem = CartItem::where('item_id', $item->id)->first();
        if (is_null($cartItem)) {
            $cartItem = CartItem::create([
                "item_id" => $item->id
            ]);
        } else {
            $cartItem->quantity++;
            $cartItem->save();
        }
        return $cartItem;
    }

    // Remove Item From Cart
    public function delete_cart_item(Request $request)
    {
        $cartItem = CartItem::find($request->id); //
        $cartItem->delete();
        return $cartItem;
    }
}
