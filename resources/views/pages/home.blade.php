@extends('layouts.app')
@section('title', $brand['name'] . ' — Handmade Resin Art & Customized Gifts')

@section('content')
{{-- HERO --}}
<section class="px-4 pb-12 pt-10 md:px-6 md:pb-24 md:pt-16">
  <div class="mx-auto max-w-7xl">
    <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-14">
      <div class="animate-fade-up lg:col-span-5">
        <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1 text-[11px] font-medium uppercase tracking-[0.18em] text-ink/60 ring-1 ring-ink/5 backdrop-blur">
          🌿 Handpoured in small batches
        </span>
        <h1 class="mt-6 font-serif text-5xl font-medium leading-[1.05] text-ink md:text-7xl">
          Preserving nature's quietest <span class="italic text-gradient-bloom">moments</span> in glass.
        </h1>
        <p class="mt-6 max-w-[42ch] text-base leading-relaxed text-ink/70 md:text-lg">
          Bespoke resin commissions that suspend botanical beauty and personal memories in eternal, luminous clarity.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 rounded-full bg-ink px-7 py-3.5 text-sm font-medium text-parchment ring-1 ring-ink transition-transform hover:-translate-y-0.5">Browse collection →</a>
          <a href="https://wa.me/{{ $brand['whatsapp'] }}?text={{ urlencode('Hi ' . $brand['name'] . "! I'd like to place a custom order.") }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-petal px-7 py-3.5 text-sm font-medium text-ink ring-1 ring-black/5 hover:bg-petal/80">Custom request</a>
        </div>
        <div class="mt-12 grid max-w-md grid-cols-3 gap-6 border-t border-ink/10 pt-8 text-center">
          <div><p class="font-serif text-2xl italic">2k+</p><p class="mt-1 text-[11px] uppercase tracking-widest text-ink/50">Pieces poured</p></div>
          <div><p class="font-serif text-2xl italic">72h</p><p class="mt-1 text-[11px] uppercase tracking-widest text-ink/50">Curing time</p></div>
          <div><p class="font-serif text-2xl italic">100%</p><p class="mt-1 text-[11px] uppercase tracking-widest text-ink/50">Handmade</p></div>
        </div>
      </div>
      <div class="lg:col-span-7">
        <div class="relative">
          <div class="absolute -inset-6 rounded-[32px] bg-gradient-to-tr from-petal/40 via-transparent to-lavender/40 blur-2xl"></div>
          <img src="{{ asset('images/hero-resin-clock.jpg') }}" alt="Floral resin clock" class="relative aspect-[4/5] w-full rounded-[28px] object-cover shadow-2xl ring-1 ring-black/5">
        </div>
      </div>
    </div>
  </div>
</section>

{{-- FEATURED COLLECTIONS --}}
<section class="bg-leaf/30 py-24">
  <div class="mx-auto max-w-7xl px-6">
    <div class="mb-14 flex items-end justify-between gap-6">
      <div>
        <h2 class="font-serif text-4xl font-medium md:text-5xl">Featured collections</h2>
        <div class="mt-4 h-px w-24 bg-ink/15"></div>
      </div>
      <a href="{{ route('categories.index') }}" class="hidden border-b border-ink/20 pb-1 text-sm font-medium md:inline">All categories</a>
    </div>
    <div class="grid gap-8 md:grid-cols-3">
      @foreach([
        ['keychains','collection-keychains.jpg','Signature Keychains','Hand-poured initial charms with seasonal blooms.'],
        ['name-plates','collection-nameplates.jpg','Custom Name Plates','Elevate your entryway with botanical elegance.'],
        ['wedding-gifts','collection-wedding.jpg','Wedding Preservations','Your special day, frozen in timeless resin.'],
      ] as [$slug,$img,$title,$sub])
        <a href="{{ route('categories.show', $slug) }}" class="group block">
          <div class="mb-6 overflow-hidden rounded-2xl ring-1 ring-black/5">
            <img src="{{ asset('images/' . $img) }}" alt="{{ $title }}" loading="lazy" class="aspect-[3/4] w-full object-cover transition-transform duration-700 group-hover:scale-105">
          </div>
          <h3 class="font-serif text-2xl">{{ $title }}</h3>
          <p class="mt-1 text-sm text-ink/60">{{ $sub }}</p>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- PROCESS --}}
<section class="px-6 py-24">
  <div class="mx-auto max-w-7xl overflow-hidden rounded-[32px] bg-ink p-10 text-parchment md:p-24">
    <div class="grid gap-16 md:grid-cols-2">
      <div>
        <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-petal/70">Our process</span>
        <h2 class="mt-4 font-serif text-4xl font-medium md:text-5xl">The art of <span class="italic">patience</span>.</h2>
        <p class="mt-6 max-w-[38ch] text-lg leading-relaxed text-parchment/70">Every piece undergoes a multi-day curing process, ensuring a glass-like finish that never yellows or cracks.</p>
        <a href="https://wa.me/{{ $brand['whatsapp'] }}" target="_blank" rel="noopener" class="mt-8 inline-flex items-center gap-2 rounded-full bg-parchment px-6 py-3 text-sm font-medium text-ink">Start a custom order →</a>
      </div>
      <div class="space-y-10">
        @foreach([
          ['01','Choose','Pick a base shape or an existing piece and tell us your vision on WhatsApp.'],
          ['02','Customize','Share names, colours, dates or a photo — we design a preview together.'],
          ['03','Handmade','We hand-set botanicals and pour resin in layers, curing over 72 hours.'],
          ['04','Delivered','Polished, boxed with cotton and shipped safely to your doorstep.'],
        ] as [$n,$t,$d])
          <div class="flex gap-6">
            <span class="font-serif text-3xl italic text-petal/50">{{ $n }}</span>
            <div>
              <h4 class="font-medium text-parchment">{{ $t }}</h4>
              <p class="mt-1 max-w-[36ch] text-sm text-parchment/60">{{ $d }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- BEST SELLERS --}}
<section class="px-6 py-24">
  <div class="mx-auto max-w-7xl">
    <div class="mb-14 flex items-end justify-between">
      <div>
        <h2 class="font-serif text-4xl font-medium">Best sellers</h2>
        <p class="mt-2 text-ink/60">Our most loved artisanal creations.</p>
      </div>
      <a href="{{ route('shop') }}" class="border-b border-ink/20 pb-1 text-sm font-medium">View all</a>
    </div>
    <div class="grid grid-cols-2 gap-6 lg:grid-cols-4">
      @foreach($bestSellers as $p)
        @include('partials.product-card', ['product' => $p])
      @endforeach
    </div>
  </div>
</section>
@endsection
