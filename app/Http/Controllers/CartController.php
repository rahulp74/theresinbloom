<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $items = collect($cart)->map(function ($item) {
            $item['line_total'] = $item['price'] * $item['quantity'];
            return $item;
        })->values();
        $total = $items->sum('line_total');
        return view('pages.cart', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|string|exists:products,slug',
            'quantity' => 'required|integer|min:1|max:99',
            'custom_text' => 'nullable|string|max:60',
            'image_note' => 'nullable|string|max:200',
        ]);
        $product = Product::where('slug', $data['slug'])->firstOrFail();

        $cart = session('cart', []);
        $key = $product->slug;
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $data['quantity'];
            if (!empty($data['custom_text'])) $cart[$key]['custom_text'] = $data['custom_text'];
            if (!empty($data['image_note'])) $cart[$key]['image_note'] = $data['image_note'];
        } else {
            $cart[$key] = [
                'slug' => $product->slug,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->imageUrl(),
                'quantity' => $data['quantity'],
                'custom_text' => $data['custom_text'] ?? null,
                'image_note' => $data['image_note'] ?? null,
            ];
        }
        session(['cart' => $cart]);
        return back()->with('status', 'Added to cart.');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|string',
            'quantity' => 'required|integer|min:1|max:99',
        ]);
        $cart = session('cart', []);
        if (isset($cart[$data['slug']])) {
            $cart[$data['slug']]['quantity'] = $data['quantity'];
            session(['cart' => $cart]);
        }
        return back();
    }

    public function remove(Request $request)
    {
        $slug = $request->input('slug');
        $cart = session('cart', []);
        unset($cart[$slug]);
        session(['cart' => $cart]);
        return back();
    }

    public function checkout(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:120',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:500',
        ]);
        $cart = session('cart', []);
        if (empty($cart)) return redirect()->route('cart.index');

        $currency = config('brand.currency');
        $lines = [];
        $lines[] = "Hello " . config('brand.name') . "! I'd like to place an order:";
        $lines[] = '';
        $i = 1;
        $total = 0;
        foreach ($cart as $item) {
            $lineTotal = $item['price'] * $item['quantity'];
            $total += $lineTotal;
            $lines[] = "{$i}. {$item['name']} × {$item['quantity']} — {$currency}" . number_format($lineTotal);
            if (!empty($item['custom_text'])) $lines[] = "   • Custom text: {$item['custom_text']}";
            if (!empty($item['image_note'])) $lines[] = "   • Image reference: {$item['image_note']}";
            $i++;
        }
        $lines[] = '';
        $lines[] = "Total: {$currency}" . number_format($total);
        if (!empty($data['name'])) $lines[] = "Name: {$data['name']}";
        if (!empty($data['address'])) $lines[] = "Address: {$data['address']}";
        if (!empty($data['notes'])) $lines[] = "Notes: {$data['notes']}";
        $lines[] = '';
        $lines[] = 'Please confirm availability and delivery time. Thank you!';

        $message = urlencode(implode("\n", $lines));
        $url = 'https://wa.me/' . config('brand.whatsapp') . '?text=' . $message;
        return redirect()->away($url);
    }
}
