@extends('layouts.app')
@section('title', 'Cart — ' . $brand['name'])

@section('content')
@php $currency = $brand['currency']; @endphp
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-6xl">
    <header class="mb-12">
      <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Your selection</span>
      <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">Cart</h1>
    </header>

    @if($items->isEmpty())
      <div class="rounded-3xl bg-mist/50 p-16 text-center">
        <p class="font-serif text-2xl italic text-ink/70">Your cart is quietly empty.</p>
        <a href="{{ route('shop') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-ink px-6 py-3 text-sm font-medium text-parchment">Browse the collection →</a>
      </div>
    @else
      <div class="grid gap-10 lg:grid-cols-3">
        <div class="space-y-4 lg:col-span-2">
          @foreach($items as $it)
            <div class="flex gap-5 rounded-2xl bg-white p-4 ring-1 ring-ink/5">
              <img src="{{ $it['image'] }}" alt="{{ $it['name'] }}" class="size-24 shrink-0 rounded-xl object-cover">
              <div class="flex flex-1 flex-col">
                <div class="flex items-start justify-between gap-4">
                  <div>
                    <p class="font-serif text-xl">{{ $it['name'] }}</p>
                    <p class="text-sm text-ink/50">{{ $currency }}{{ number_format($it['price']) }}</p>
                    @if(!empty($it['custom_text']))<p class="mt-1 text-xs text-ink/60">Custom: {{ $it['custom_text'] }}</p>@endif
                    @if(!empty($it['image_note']))<p class="text-xs text-ink/60">Ref: {{ $it['image_note'] }}</p>@endif
                  </div>
                  <form method="POST" action="{{ route('cart.remove') }}">@csrf
                    <input type="hidden" name="slug" value="{{ $it['slug'] }}">
                    <button class="text-ink/40 hover:text-ink" aria-label="Remove">✕</button>
                  </form>
                </div>
                <div class="mt-auto flex items-center justify-between pt-3">
                  <form method="POST" action="{{ route('cart.update') }}" class="flex items-center gap-2">@csrf
                    <input type="hidden" name="slug" value="{{ $it['slug'] }}">
                    <input type="number" name="quantity" value="{{ $it['quantity'] }}" min="1" max="99" class="w-16 rounded-full border border-ink/10 bg-white px-3 py-1.5 text-center text-sm">
                    <button type="submit" class="rounded-full bg-ink/5 px-3 py-1 text-xs">Update</button>
                  </form>
                  <p class="font-serif text-lg italic">{{ $currency }}{{ number_format($it['line_total']) }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <aside class="sticky top-24 h-fit rounded-3xl bg-white p-8 ring-1 ring-ink/5">
          <h2 class="font-serif text-2xl">Order summary</h2>
          <dl class="mt-6 space-y-3 border-t border-ink/10 pt-6 text-sm">
            <div class="flex justify-between text-ink/60"><dt>Subtotal</dt><dd>{{ $currency }}{{ number_format($total) }}</dd></div>
            <div class="flex justify-between text-ink/60"><dt>Delivery</dt><dd>Confirmed on WhatsApp</dd></div>
            <div class="flex justify-between border-t border-ink/10 pt-3 font-serif text-xl"><dt>Total</dt><dd class="italic">{{ $currency }}{{ number_format($total) }}</dd></div>
          </dl>
          <form method="POST" action="{{ route('cart.checkout') }}" class="mt-6 space-y-3">@csrf
            <input name="name" placeholder="Your name" class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
            <textarea name="address" placeholder="Delivery address" rows="3" class="w-full resize-none rounded-2xl border border-ink/10 bg-white px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-ink/10"></textarea>
            <textarea name="notes" placeholder="Order notes (optional)" rows="2" class="w-full resize-none rounded-2xl border border-ink/10 bg-white px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-ink/10"></textarea>
            <button class="mt-2 inline-flex w-full items-center justify-center gap-2 rounded-full bg-whatsapp px-6 py-3.5 text-sm font-semibold text-white shadow-lg transition-transform hover:-translate-y-0.5">Order on WhatsApp →</button>
          </form>
          <p class="mt-3 text-center text-[11px] text-ink/50">Your cart items, customisations and total will be sent as a message.</p>
        </aside>
      </div>
    @endif
  </div>
</div>
@endsection
