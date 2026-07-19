@extends('layouts.app')
@section('title', 'FAQ — ' . $brand['name'])

@section('content')
<div class="px-6 py-14 md:py-20">
  <div class="mx-auto max-w-3xl">
    <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-ink/50">Answers</span>
    <h1 class="mt-4 font-serif text-5xl font-medium md:text-6xl">FAQ</h1>

    <div class="mt-12 space-y-4">
      @foreach([
        ['How do I place an order?','Browse the shop, add pieces to your cart, then hit "Order on WhatsApp". Your selection and any customisations arrive as a message we confirm within a few hours.'],
        ['How long does a custom order take?','Standard pieces ship in 10–14 days. Wedding preservations and larger commissions take 4–8 weeks depending on the flowers.'],
        ['Do you ship worldwide?','Yes. We ship across India via insured courier, and internationally via DHL. Rates are confirmed on WhatsApp based on weight and destination.'],
        ['Are the pieces safe to use?','All food-contact surfaces (coasters, trays) are cured with food-safe epoxy. Once fully cured, resin is inert and safe.'],
        ['Can I send my own flowers?','Absolutely — bouquet preservations start from your actual flowers. We provide courier collection anywhere in India.'],
        ['What is your return policy?','Because every piece is made to order, we can\'t accept returns. But if a piece arrives damaged we\'ll repair or replace it — just send a photo on WhatsApp within 48 hours.'],
      ] as [$q,$a])
        <details class="group rounded-2xl bg-white/70 p-6 ring-1 ring-ink/5 backdrop-blur">
          <summary class="cursor-pointer list-none font-serif text-xl">{{ $q }}</summary>
          <p class="mt-4 text-ink/70">{{ $a }}</p>
        </details>
      @endforeach
    </div>
  </div>
</div>
@endsection
