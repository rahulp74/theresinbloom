@php
  // Vibrant SVG florals — daisies, roses, blossoms, leaves, lavender sprigs.
  $palette = ['#EC407A','#F8BBD0','#B57EDC','#81D4FA','#A5D6A7','#FFD54F','#FF8A65','#FFCCBC'];
  $shapes  = ['daisy','rose','blossom','leaf','lavender'];

  function rb_shape($shape, $color, $size) {
    $s = (int) $size;
    switch ($shape) {
      case 'rose':
        return "<svg width='$s' height='$s' viewBox='0 0 40 40' fill='none'>
          <circle cx='20' cy='20' r='14' fill='$color' opacity='0.55'/>
          <circle cx='20' cy='20' r='9'  fill='$color' opacity='0.75'/>
          <circle cx='20' cy='20' r='5'  fill='$color'/>
          <circle cx='20' cy='20' r='2'  fill='#fff3b0'/>
        </svg>";
      case 'blossom':
        $petals = '';
        foreach ([0,72,144,216,288] as $d) {
          $petals .= "<ellipse cx='20' cy='12' rx='6' ry='9' fill='$color' opacity='0.9' transform='rotate($d 20 20)'/>";
        }
        return "<svg width='$s' height='$s' viewBox='0 0 40 40' fill='none'>$petals<circle cx='20' cy='20' r='3.5' fill='#FFD54F'/></svg>";
      case 'leaf':
        return "<svg width='$s' height='$s' viewBox='0 0 40 40' fill='none'>
          <path d='M8 32 Q 20 4, 32 8 Q 28 28, 8 32 Z' fill='$color' opacity='0.75'/>
          <path d='M10 30 Q 22 18, 30 12' stroke='#3d5a3a' stroke-width='0.8' fill='none' opacity='0.5'/>
        </svg>";
      case 'lavender':
        $buds = '';
        $i = 0;
        foreach ([6,10,14,18] as $y) {
          $r = 4 - $i * 0.4;
          $buds .= "<circle cx='20' cy='$y' r='$r' fill='$color' opacity='0.9'/>";
          $i++;
        }
        return "<svg width='$s' height='$s' viewBox='0 0 40 40' fill='none'>
          <path d='M20 34 L20 18' stroke='#7ea77a' stroke-width='1.5'/>$buds
        </svg>";
      default: // daisy
        $petals = '';
        foreach ([0,45,90,135,180,225,270,315] as $d) {
          $petals .= "<ellipse cx='20' cy='10' rx='4' ry='8' fill='$color' opacity='0.9' transform='rotate($d 20 20)'/>";
        }
        return "<svg width='$s' height='$s' viewBox='0 0 40 40' fill='none'>$petals<circle cx='20' cy='20' r='4' fill='#FFD54F'/></svg>";
    }
  }
@endphp
<div aria-hidden="true" class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
  @for ($i = 0; $i < 22; $i++)
    @php
      $left     = ($i * 9 + 3) % 100;
      $delay    = ($i * 1.3);
      $duration = 20 + ($i % 7) * 3;
      $size     = 16 + ($i % 6) * 7;
      $color    = $palette[$i % count($palette)];
      $shape    = $shapes[$i % count($shapes)];
    @endphp
    <div class="petal-float animate-petal-drift"
         style="left: {{ $left }}%; animation-delay: -{{ $delay }}s; animation-duration: {{ $duration }}s;">
      {!! rb_shape($shape, $color, $size) !!}
    </div>
  @endfor
</div>
