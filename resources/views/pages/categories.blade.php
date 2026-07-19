@extends('layouts.app')
@section('title', 'Categories — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-7xl">
    <header class="mb-12 max-w-2xl">
      <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Explore</span>
      <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">Categories</h1>
      <p class="mt-4 text-ink/70">Nine collections of handmade resin gifts — pick a mood, we'll bring it to life.</p>
    </header>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @foreach($categories as $c)
        <a href="{{ route('categories.show', $c->slug) }}" class="group block rounded-2xl bg-white/70 p-8 ring-1 ring-ink/5 backdrop-blur transition-transform hover:-translate-y-1">
          <p class="text-[11px] uppercase tracking-widest text-ink/40">{{ $c->products_count }} pieces</p>
          <h3 class="mt-2 font-serif text-2xl">{{ $c->name }}</h3>
          <p class="mt-2 text-sm text-ink/60">{{ $c->tagline }}</p>
          <span class="mt-4 inline-block border-b border-ink/20 pb-0.5 text-sm">Browse →</span>
        </a>
      @endforeach
    </div>
  </div>
</div>
@endsection
