<header class="sticky top-0 z-40 border-b border-ink/5 bg-parchment/80 backdrop-blur">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
    <a href="{{ route('home') }}" class="font-serif text-2xl italic tracking-tight text-ink">
      the<span class="text-gradient-bloom font-semibold not-italic">resin</span>bloom
    </a>
    <nav class="hidden items-center gap-8 text-sm md:flex">
      <a href="{{ route('shop') }}" class="text-ink/70 hover:text-ink">Shop</a>
      <a href="{{ route('categories.index') }}" class="text-ink/70 hover:text-ink">Categories</a>
      <a href="{{ route('customized') }}" class="text-ink/70 hover:text-ink">Customized</a>
      <a href="{{ route('gallery') }}" class="text-ink/70 hover:text-ink">Gallery</a>
      <a href="{{ route('about') }}" class="text-ink/70 hover:text-ink">About</a>
      <a href="{{ route('contact') }}" class="text-ink/70 hover:text-ink">Contact</a>
    </nav>
    <div class="flex items-center gap-3">
      <a href="{{ route('cart.index') }}" class="relative rounded-full bg-white/70 px-4 py-2 text-sm font-medium text-ink ring-1 ring-ink/10 hover:bg-white">
        Cart
        @if(($cartCount ?? 0) > 0)
          <span class="ml-1 inline-flex size-5 items-center justify-center rounded-full bg-ink text-[10px] text-parchment">{{ $cartCount }}</span>
        @endif
      </a>
    </div>
  </div>
</header>
