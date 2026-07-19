@props(['product'])
@php $currency = $brand['currency']; @endphp
<a href="{{ route('products.show', $product->slug) }}" class="group block">
  <div class="relative mb-4 overflow-hidden rounded-2xl bg-mist ring-1 ring-black/5">
    <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" loading="lazy"
         class="aspect-square w-full object-cover transition-transform duration-700 group-hover:scale-105">
    @if($product->best_seller)
      <span class="absolute left-3 top-3 rounded-full bg-white/85 px-2.5 py-1 text-[10px] font-medium uppercase tracking-widest text-ink/70 backdrop-blur">Best seller</span>
    @endif
  </div>
  <h3 class="font-serif text-lg text-ink">{{ $product->name }}</h3>
  <p class="mt-1 text-sm italic text-ink/60">{{ $currency }}{{ number_format($product->price) }}</p>
</a>
