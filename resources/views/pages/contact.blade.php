@extends('layouts.app')
@section('title', 'Contact — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto grid max-w-6xl gap-12 md:grid-cols-2">
    <div>
      <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Say hello</span>
      <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">Contact</h1>
      <p class="mt-4 text-ink/70">We reply fastest on WhatsApp. For custom commissions, share as much detail as you can — photos, names, dates, colours.</p>
      <ul class="mt-8 space-y-3 text-sm text-ink/70">
        <li>📧 <a href="mailto:{{ $brand['email'] }}" class="hover:text-ink">{{ $brand['email'] }}</a></li>
        <li>💬 <a href="https://wa.me/{{ $brand['whatsapp'] }}" class="hover:text-ink">WhatsApp us</a></li>
        <li>📷 <a href="{{ $brand['instagram'] }}" class="hover:text-ink">Instagram</a></li>
      </ul>
    </div>

    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4 rounded-3xl bg-white/80 p-8 ring-1 ring-ink/5 backdrop-blur">
      @csrf
      @if($errors->any())
        <div class="rounded-xl bg-coral/20 p-3 text-sm text-ink/80">
          @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
        </div>
      @endif
      <input name="name" placeholder="Your name" required class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
      <input name="email" type="email" placeholder="Email" required class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
      <input name="subject" placeholder="Subject" required class="w-full rounded-full border border-ink/10 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-ink/10">
      <textarea name="message" rows="5" placeholder="Tell us what you have in mind…" required class="w-full resize-none rounded-2xl border border-ink/10 bg-white px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-ink/10"></textarea>
      <button class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-ink px-6 py-3.5 text-sm font-medium text-parchment">Send via WhatsApp →</button>
    </form>
  </div>
</div>
@endsection
