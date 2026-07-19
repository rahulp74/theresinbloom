@extends('layouts.app')
@section('title', 'Admin login — ' . $brand['name'])
@section('content')
<div class="mx-auto max-w-md px-6 py-20">
  <h1 class="font-serif text-4xl">Admin</h1>
  <form method="POST" action="{{ route('admin.login.submit') }}" class="mt-8 space-y-4 rounded-2xl bg-white/80 p-6 ring-1 ring-ink/5">
    @csrf
    @if($errors->any())<p class="rounded-xl bg-coral/20 p-3 text-sm">{{ $errors->first() }}</p>@endif
    <input name="email" type="email" placeholder="Email" required value="{{ old('email') }}" class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm">
    <input name="password" type="password" placeholder="Password" required class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm">
    <button class="w-full rounded-full bg-ink px-6 py-3 text-sm font-medium text-parchment">Sign in</button>
  </form>
</div>
@endsection
