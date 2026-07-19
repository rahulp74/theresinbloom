@extends('layouts.app')
@section('title', 'Gallery — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-7xl">
    <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Our work</span>
    <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">Gallery</h1>
    <p class="mt-4 max-w-2xl text-ink/70">A living archive of past commissions — clocks, bouquets, nameplates and quiet still lifes.</p>

    <div class="mt-12 grid grid-cols-2 gap-4 md:grid-cols-4">
      @foreach(['hero-resin-clock.jpg','product-clock.jpg','product-coaster.jpg','product-couple.jpg','product-frame.jpg','product-keychain.jpg','product-nameplate.jpg','product-tray.jpg','product-wedding.jpg','collection-keychains.jpg','collection-nameplates.jpg','collection-wedding.jpg'] as $img)
        <div class="overflow-hidden rounded-2xl ring-1 ring-black/5">
          <img src="{{ asset('images/' . $img) }}" alt="Studio work" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
