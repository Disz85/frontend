<figure class="figure">
    <picture class="picture">
            @foreach(array_combine($breakpoints, $presets) as $breakpoint => $preset)
                @php
                    $settings = array_filter([
                        'w' => Arr::get($preset, 'w'),
                        'h' => Arr::get($preset, 'h'),
                        'fm' => Arr::get($preset, 'fm', 'webp'),
                    ]);

                    $hdSettings = [];
                    foreach ($settings as $key => $value) {
                        $hdSettings[$key] = in_array($key, ['w', 'h']) ? ($value * 2) : $value;
                    }
                @endphp

                @if($settings['w'])
                    <source media="(max-width: {{ $breakpoint }}px)"
                            srcset="{{ $path . Arr::get($settings, 'w') . 'x' . Arr::get($settings, 'h') }}, {{  $path . $hdSettings['w'] . 'x' . $hdSettings['h'] }} }} 2x"
                            type="image/webp">
                @endif
            @endforeach

            {{-- Fallback jpg and last webp source without media --}}
            @foreach($formats as $format)
                @php $settings['fm'] = $hdSettings['fm'] = $format; @endphp
                <source
                    srcset="{{ $path . Arr::get($settings, 'w') . 'x' . Arr::get($settings, 'h') }}, {{  $path . $hdSettings['w'] . 'x' . $hdSettings['h'] }} }} 2x"
                    type="image/{{$format}}">
            @endforeach


            <img width="{{ Arr::get($settings, 'w') }}"
                 height="{{ Arr::get($settings, 'h', Arr::get($settings, 'w')) }}"
                 class="picture__image img-fluid {{ $cssClass }}"
                 loading="lazy"
                 src="{{$path . '300'}}"
                 alt="{{ $alt }}"
            >
    </picture>

    @if($figcaption)
        <figcaption class="figure__caption">
            {{ $figcaption }}
        </figcaption>
    @endif
</figure>
