@extends('layouts.app')
@section('title', 'Customized gifts — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-5xl">
    <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Made just for you</span>
    <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">Customized gifts</h1>
    <p class="mt-6 max-w-2xl text-ink/70">
      Bring us a photo, a bouquet, a colour palette or a name — we'll design a one-of-one piece around it.
      Every commission begins with a WhatsApp conversation so we can get the details right.
    </p>

    <div class="mt-12 grid gap-8 md:grid-cols-3">
      @foreach([
        ['Wedding preservations','Freeze your bouquet inside a resin dome or serving tray.','8500'],
        ['Anniversary blocks','Names, dates and preserved roses hand-set in a keepsake block.','3200'],
        ['Corporate gifting','Custom nameplates, coasters and keychains for teams and events.','From 650'],
      ] as [$t,$d,$p])
        <div class="rounded-2xl bg-white/70 p-8 ring-1 ring-ink/5 backdrop-blur">
          <h3 class="font-serif text-2xl">{{ $t }}</h3>
          <p class="mt-3 text-sm text-ink/60">{{ $d }}</p>
          <p class="mt-6 font-serif text-lg italic">{{ $brand['currency'] }}{{ $p }}</p>
        </div>
      @endforeach
    </div>

    <div class="mt-14 text-center">
      <a href="https://wa.me/{{ $brand['whatsapp'] }}?text={{ urlencode('Hi ' . $brand['name'] . '! I\'d like to discuss a custom order.') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-whatsapp px-8 py-4 text-sm font-semibold text-white shadow-lg">Start on WhatsApp →</a>
    </div>
  </div>
</div>
@endsection
