@extends('layouts.app')
@section('title', $product->name . ' — ' . $brand['name'])
@section('description', $product->description)

@section('content')
@php $currency = $brand['currency']; @endphp
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-7xl">
    <nav class="mb-8 text-xs uppercase tracking-widest text-ink/50">
      <a href="{{ route('shop') }}" class="hover:text-ink">Shop</a>
      <span class="mx-2">/</span>
      <span class="text-ink">{{ $product->name }}</span>
    </nav>

    <div class="grid gap-14 lg:grid-cols-2">
      <div class="overflow-hidden rounded-3xl bg-mist ring-1 ring-black/5">
        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" class="aspect-square w-full object-cover transition-transform duration-700 hover:scale-110">
      </div>

      <div>
        <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Handmade to order</span>
        <h1 class="mt-3 font-serif text-4xl font-medium md:text-5xl">{{ $product->name }}</h1>
        <p class="mt-4 font-serif text-2xl italic text-ink/80">{{ $currency }}{{ number_format($product->price) }}</p>
        <p class="mt-6 text-ink/70">{{ $product->description }}</p>

        @if(!empty($product->details))
          <ul class="mt-8 space-y-2 border-t border-ink/10 pt-6 text-sm text-ink/70">
            @foreach($product->details as $d)
              <li class="flex items-start gap-2"><span class="mt-0.5">✓</span> <span>{{ $d }}</span></li>
            @endforeach
          </ul>
        @endif

        <form method="POST" action="{{ route('cart.add') }}" class="mt-8 space-y-4">
          @csrf
          <input type="hidden" name="slug" value="{{ $product->slug }}">

          @if($product->customizable)
            <div class="space-y-4 rounded-2xl bg-petal/30 p-6 ring-1 ring-black/5">
              <p class="text-xs font-semibold uppercase tracking-widest text-ink/70">Personalise this piece</p>
              <div>
                <label class="mb-1 block text-xs text-ink/60">Custom name or text</label>
                <input name="custom_text" maxlength="60" placeholder="e.g. Priya & Arjun · 24.11.2025" class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
              </div>
              <div>
                <label class="mb-1 block text-xs text-ink/60">Reference image URL (or describe)</label>
                <input name="image_note" maxlength="200" placeholder="Paste a link or describe your idea — we'll continue on WhatsApp" class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
              </div>
            </div>
          @endif

          <div class="flex flex-wrap items-center gap-4">
            <input type="number" name="quantity" value="1" min="1" max="99" class="w-24 rounded-full border border-ink/10 bg-white px-4 py-2.5 text-center text-sm outline-none">
            <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-ink px-7 py-3.5 text-sm font-medium text-parchment ring-1 ring-ink transition-transform hover:-translate-y-0.5">Add to cart</button>
            <a href="https://wa.me/{{ $brand['whatsapp'] }}?text={{ urlencode("Hi " . $brand['name'] . "! I'm interested in the \"" . $product->name . "\" — could you share more details and customisation options?") }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-petal px-7 py-3.5 text-sm font-medium text-ink ring-1 ring-black/5 hover:bg-petal/80">Ask on WhatsApp</a>
          </div>
        </form>

        <p class="mt-6 text-xs text-ink/50">Estimated delivery: 10–14 days after order confirmation.</p>
      </div>
    </div>

    @if($related->isNotEmpty())
      <section class="mt-24">
        <h2 class="mb-8 font-serif text-3xl font-medium">You may also love</h2>
        <div class="grid grid-cols-2 gap-6 lg:grid-cols-4">
          @foreach($related as $p)
            @include('partials.product-card', ['product' => $p])
          @endforeach
        </div>
      </section>
    @endif
  </div>
</div>
@endsection
