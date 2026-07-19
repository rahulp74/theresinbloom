<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $brand['name'] . ' — ' . $brand['tagline'])</title>
    <meta name="description" content="@yield('description', 'Bespoke resin keychains, name plates, photo frames, wedding preservations and custom gifts — handpoured with pressed flowers. Order on WhatsApp.')">
    <meta property="og:title" content="@yield('title', $brand['name'])">
    <meta property="og:description" content="@yield('description', 'Handmade resin art & customized gifts.')">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              parchment: '#FFF7FB',
              ink: '#2B1F38',
              petal: '#FFE4EF',
              blush: '#F8BBD0',
              rose: '#EC407A',
              lavender: '#B57EDC',
              leaf: '#DFF4E1',
              sage: '#9CAF88',
              mist: '#E6F4FF',
              sky: '#81D4FA',
              mint: '#A5D6A7',
              sunflower: '#FFD54F',
              peach: '#FFCCBC',
              coral: '#FF8A65',
              whatsapp: '#25D366',
            },
            fontFamily: {
              serif: ['Cormorant Garamond', 'ui-serif', 'Georgia', 'serif'],
              sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            animation: {
              'fade-up': 'fadeUp 0.7s ease-out both',
              'petal-drift': 'petalDrift 22s linear infinite',
            },
            keyframes: {
              fadeUp: { '0%': { opacity: '0', transform: 'translateY(14px)' }, '100%': { opacity: '1', transform: 'none' } },
              petalDrift: { '0%': { transform: 'translateY(-10vh) rotate(0)' }, '100%': { transform: 'translateY(110vh) rotate(360deg)' } },
            }
          }
        }
      }
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans text-ink antialiased">
    <div class="relative min-h-screen flex flex-col">
        @include('partials.floral-petals')
        <div class="relative z-10 flex min-h-screen flex-col">
            @include('partials.header')
            <main class="flex-1">
                @if(session('status'))
                    <div class="mx-auto mt-4 max-w-3xl rounded-full bg-leaf/60 px-5 py-2 text-center text-sm text-ink">
                        {{ session('status') }}
                    </div>
                @endif
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
        @include('partials.whatsapp-fab')
    </div>
</body>
</html>
