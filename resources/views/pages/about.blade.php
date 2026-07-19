@extends('layouts.app')
@section('title', 'About — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-4xl">
    <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Our story</span>
    <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">A small studio, blooming.</h1>
    <div class="prose prose-lg mt-10 max-w-none text-ink/75">
      <p>{{ $brand['name'] }} began as a quiet Sunday hobby — pressing petals from garden roses into small resin coasters for friends. Six years on, our studio pours over two thousand pieces a year, each one still by hand.</p>
      <p>We believe the most memorable gifts are the ones that carry a story. That's why every commission starts with a WhatsApp conversation, not a checkout page. We want to know whose name goes on the plate, which bouquet you'd like preserved, or which shade of blue reminds you of the sea.</p>
      <p>Our materials are chosen with care: food-safe two-part epoxy that cures crystal clear, botanicals picked and dried in our own garden, and gold leaf sourced from a family workshop in Jaipur.</p>
    </div>
  </div>
</div>
@endsection
