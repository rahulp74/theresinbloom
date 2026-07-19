@extends('layouts.app')
@section('title', ($product->exists ? 'Edit' : 'New') . ' product — Admin')
@section('content')
@php $isEdit = $product->exists; @endphp
<div class="mx-auto max-w-3xl px-6 py-14">
  <a href="{{ route('admin.products.index') }}" class="text-xs uppercase tracking-widest text-ink/50">← Back</a>
  <h1 class="mt-4 font-serif text-4xl font-medium">{{ $isEdit ? 'Edit product' : 'New product' }}</h1>

  <form method="POST" action="{{ $isEdit ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="mt-8 space-y-4 rounded-2xl bg-white/80 p-6 ring-1 ring-ink/5">
    @csrf
    @if($isEdit) @method('PUT') @endif

    @if($errors->any())
      <div class="rounded-xl bg-coral/20 p-3 text-sm">@foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach</div>
    @endif

    <div class="grid gap-4 md:grid-cols-2">
      <label class="block"><span class="text-xs text-ink/60">Name</span>
        <input name="name" value="{{ old('name', $product->name) }}" required class="mt-1 w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm"></label>
      <label class="block"><span class="text-xs text-ink/60">Slug (optional)</span>
        <input name="slug" value="{{ old('slug', $product->slug) }}" class="mt-1 w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm"></label>
      <label class="block"><span class="text-xs text-ink/60">Category</span>
        <select name="category_id" required class="mt-1 w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm">
          @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id', $product->category_id) == $c->id)>{{ $c->name }}</option>
          @endforeach
        </select></label>
      <label class="block"><span class="text-xs text-ink/60">Price ({{ $brand['currency'] }})</span>
        <input type="number" name="price" min="0" value="{{ old('price', $product->price ?? 0) }}" required class="mt-1 w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm"></label>
      <label class="block"><span class="text-xs text-ink/60">Swatch</span>
        <select name="swatch" class="mt-1 w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm">
          @foreach(['petal','mist','leaf','lavender'] as $s)
            <option value="{{ $s }}" @selected(old('swatch', $product->swatch) === $s)>{{ ucfirst($s) }}</option>
          @endforeach
        </select></label>
      <label class="block"><span class="text-xs text-ink/60">Image (upload)</span>
        <input type="file" name="image" accept="image/*" class="mt-1 w-full text-sm">
        @if($isEdit)<p class="mt-1 text-xs text-ink/50">Current: {{ $product->image }}</p>@endif
      </label>
    </div>

    <label class="block"><span class="text-xs text-ink/60">Description</span>
      <textarea name="description" rows="4" required class="mt-1 w-full rounded-2xl border border-ink/10 bg-white px-4 py-3 text-sm">{{ old('description', $product->description) }}</textarea></label>

    <label class="block"><span class="text-xs text-ink/60">Details (one per line)</span>
      <textarea name="details_text" rows="5" class="mt-1 w-full rounded-2xl border border-ink/10 bg-white px-4 py-3 text-sm">{{ old('details_text', is_array($product->details) ? implode("\n", $product->details) : '') }}</textarea></label>

    <div class="flex flex-wrap gap-6 text-sm">
      <label class="flex items-center gap-2"><input type="hidden" name="best_seller" value="0"><input type="checkbox" name="best_seller" value="1" @checked(old('best_seller', $product->best_seller))> Best seller</label>
      <label class="flex items-center gap-2"><input type="hidden" name="featured" value="0"><input type="checkbox" name="featured" value="1" @checked(old('featured', $product->featured))> Featured</label>
      <label class="flex items-center gap-2"><input type="hidden" name="customizable" value="0"><input type="checkbox" name="customizable" value="1" @checked(old('customizable', $product->customizable))> Customizable</label>
    </div>

    <div class="pt-2">
      <button class="rounded-full bg-ink px-6 py-3 text-sm font-medium text-parchment">{{ $isEdit ? 'Save changes' : 'Create product' }}</button>
    </div>
  </form>
</div>
@endsection
