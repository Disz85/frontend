@props([
    'link'=> '',
    'text' => '',
    'cssModifiers' => ['primary'],
    'cssBootstrap' => ['btn'],
    'target' => '',
    'data' => [],
    ])

@php
    $dataAttributes = implode(' ', array_map(
        function ($val, $key) {
            return sprintf("%s=%s", 'data-' . $key, $val);
            },
        $data,
        array_keys($data)
    ));

    $cssClasses = 'button button--' . implode(" button--", $cssModifiers) . ' btn btn-' . implode(" btn-", $cssModifiers);
@endphp

@if($link)
    <a class="{{$cssClasses}}"
       href="{{$link}}"
       {{ $dataAttributes }}
    >
        {{$text}}
    </a>
@else
    <button class="{{$cssClasses}}"
            type="button"
            {{ $target ? 'data-bs-target=#js'. ucfirst($target) : ''}}
            {{ $dataAttributes }}
            {{ $attributes }}
    >
        <span>{{$text}}</span>
        {{$slot}}
    </button>
@endif
