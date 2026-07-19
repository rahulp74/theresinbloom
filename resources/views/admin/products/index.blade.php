@extends('layouts.app')
@section('title', 'Admin — Products')
@section('content')
<div class="mx-auto max-w-7xl px-6 py-14">
  <div class="mb-8 flex items-center justify-between">
    <div>
      <span class="text-[11px] uppercase tracking-widest text-ink/50">Admin</span>
      <h1 class="mt-2 font-serif text-4xl font-medium">Products</h1>
    </div>
    <div class="flex gap-2">
      <a href="{{ route('admin.products.create') }}" class="rounded-full bg-ink px-5 py-2.5 text-sm font-medium text-parchment">+ New product</a>
      <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="rounded-full bg-white px-4 py-2.5 text-sm ring-1 ring-ink/10">Log out</button></form>
    </div>
  </div>

  <div class="overflow-hidden rounded-2xl bg-white ring-1 ring-ink/5">
    <table class="w-full text-sm">
      <thead class="bg-ink/5 text-left text-xs uppercase tracking-widest text-ink/60">
        <tr><th class="px-4 py-3">Image</th><th class="px-4 py-3">Name</th><th class="px-4 py-3">Category</th><th class="px-4 py-3">Price</th><th class="px-4 py-3">Flags</th><th class="px-4 py-3"></th></tr>
      </thead>
      <tbody>
        @foreach($products as $p)
          <tr class="border-t border-ink/5">
            <td class="px-4 py-3"><img src="{{ $p->imageUrl() }}" class="size-12 rounded-lg object-cover"></td>
            <td class="px-4 py-3 font-medium">{{ $p->name }}</td>
            <td class="px-4 py-3 text-ink/60">{{ $p->category?->name }}</td>
            <td class="px-4 py-3">{{ $brand['currency'] }}{{ number_format($p->price) }}</td>
            <td class="px-4 py-3 text-xs text-ink/60">
              @if($p->best_seller)<span class="mr-1 rounded bg-petal/40 px-2 py-0.5">Best</span>@endif
              @if($p->featured)<span class="mr-1 rounded bg-lavender/30 px-2 py-0.5">Featured</span>@endif
              @if($p->customizable)<span class="rounded bg-leaf/40 px-2 py-0.5">Custom</span>@endif
            </td>
            <td class="px-4 py-3 text-right">
              <a href="{{ route('admin.products.edit', $p) }}" class="text-ink/70 hover:text-ink">Edit</a>
              <form method="POST" action="{{ route('admin.products.destroy', $p) }}" class="inline" onsubmit="return confirm('Delete this product?')">
                @csrf @method('DELETE')
                <button class="ml-3 text-coral">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
