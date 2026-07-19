@extends('layouts.app')
@section('title', 'Shop — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-7xl">
    <header class="mb-10 max-w-2xl">
      <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">The shop</span>
      <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">The full collection</h1>
      <p class="mt-4 text-ink/70">Every piece is handmade to order. Reach us on WhatsApp for customisations, bulk orders and gifting.</p>
    </header>

    <form method="get" class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <input type="text" name="q" value="{{ $q }}" placeholder="Search resin gifts…" class="w-full max-w-sm rounded-full border border-ink/10 bg-white px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-ink/10">
      <div class="flex flex-wrap gap-2">
        <a href="{{ route('shop') }}" class="rounded-full px-3 py-1.5 text-xs font-medium {{ !$catSlug ? 'bg-ink text-parchment' : 'bg-white text-ink/70 ring-1 ring-ink/10 hover:bg-ink/5' }}">All</a>
        @foreach($categories as $c)
          <a href="{{ route('shop', ['category' => $c->slug, 'q' => $q]) }}" class="rounded-full px-3 py-1.5 text-xs font-medium {{ $catSlug === $c->slug ? 'bg-ink text-parchment' : 'bg-white text-ink/70 ring-1 ring-ink/10 hover:bg-ink/5' }}">{{ $c->name }}</a>
        @endforeach
      </div>
    </form>

    @if($products->isEmpty())
      <p class="rounded-2xl bg-mist/60 p-10 text-center text-ink/60">No pieces match that search. Try a different keyword or category.</p>
    @else
      <div class="grid grid-cols-2 gap-6 lg:grid-cols-4">
        @foreach($products as $p)
          @include('partials.product-card', ['product' => $p])
        @endforeach
      </div>
    @endif
  </div>
</div>
@endsection
