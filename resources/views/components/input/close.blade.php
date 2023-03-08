@props(['data' => []])

@php
    $dataAttributes = implode(' ', array_map(
        function ($val, $key) {
            return sprintf("%s=%s", 'data-' . $key, $val);
            },
        $data,
        array_keys($data)
    ));
@endphp

<button class="close" {{ $dataAttributes }}></button>
