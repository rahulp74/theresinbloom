@extends('layouts.app')
@section('title', $category->name . ' — ' . $brand['name'])
@section('description', $category->tagline)

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-7xl">
    <nav class="mb-8 text-xs uppercase tracking-widest text-ink/50">
      <a href="{{ route('categories.index') }}" class="hover:text-ink">Categories</a>
      <span class="mx-2">/</span>
      <span class="text-ink">{{ $category->name }}</span>
    </nav>
    <header class="mb-12 max-w-2xl">
      <h1 class="font-serif text-5xl font-medium md:text-6xl">{{ $category->name }}</h1>
      <p class="mt-4 text-ink/70">{{ $category->tagline }}</p>
    </header>

    @if($products->isEmpty())
      <p class="rounded-2xl bg-mist/60 p-10 text-center text-ink/60">No pieces in this collection yet — check back soon or ask on WhatsApp.</p>
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
