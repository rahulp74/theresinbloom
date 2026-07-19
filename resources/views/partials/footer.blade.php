<footer class="mt-24 border-t border-ink/10 bg-parchment/60 backdrop-blur">
  <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-4">
    <div>
      <p class="font-serif text-2xl italic">{{ $brand['name'] }}</p>
      <p class="mt-3 text-sm text-ink/60">{{ $brand['tagline'] }}</p>
    </div>
    <div>
      <p class="mb-3 text-xs uppercase tracking-widest text-ink/50">Shop</p>
      <ul class="space-y-2 text-sm">
        <li><a href="{{ route('shop') }}" class="text-ink/70 hover:text-ink">All products</a></li>
        <li><a href="{{ route('categories.index') }}" class="text-ink/70 hover:text-ink">Categories</a></li>
        <li><a href="{{ route('customized') }}" class="text-ink/70 hover:text-ink">Customized gifts</a></li>
      </ul>
    </div>
    <div>
      <p class="mb-3 text-xs uppercase tracking-widest text-ink/50">Studio</p>
      <ul class="space-y-2 text-sm">
        <li><a href="{{ route('about') }}" class="text-ink/70 hover:text-ink">About</a></li>
        <li><a href="{{ route('faq') }}" class="text-ink/70 hover:text-ink">FAQ</a></li>
        <li><a href="{{ route('contact') }}" class="text-ink/70 hover:text-ink">Contact</a></li>
      </ul>
    </div>
    <div>
      <p class="mb-3 text-xs uppercase tracking-widest text-ink/50">Reach us</p>
      <ul class="space-y-2 text-sm">
        <li><a href="mailto:{{ $brand['email'] }}" class="text-ink/70 hover:text-ink">{{ $brand['email'] }}</a></li>
        <li><a href="{{ $brand['instagram'] }}" class="text-ink/70 hover:text-ink">Instagram</a></li>
        <li><a href="https://wa.me/{{ $brand['whatsapp'] }}" class="text-ink/70 hover:text-ink">WhatsApp</a></li>
      </ul>
    </div>
  </div>
  <div class="border-t border-ink/10 py-4 text-center text-xs text-ink/50">
    © {{ date('Y') }} {{ $brand['name'] }} · Handmade with care.
  </div>
</footer>
