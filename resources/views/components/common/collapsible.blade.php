@props(['type' => 'collapseArticle',
        'parent' => 'collapseArticles',
        'button' => '',
        'buttonCssClass' => '',
        'itemCssClass' => '',
        'listItem' => false])

@php
    $isListItem = $listItem ? 'li' : 'div';
@endphp

<{{$isListItem}} class="collapsible__button {{$buttonCssClass}}"
     data-bs-toggle="collapse"
     data-bs-target="#js{{ucfirst($type)}}"
     aria-expanded="false"
     aria-controls="js{{ucfirst($type)}}">
    {{ $button }}
</{{$isListItem}}>
<{{$isListItem}} class="collapsible__item accordion-collapse collapse position-relative {{$itemCssClass}}"
     id="js{{ucfirst($type)}}"
     aria-labelledby="headingOne"
     data-bs-parent="#js{{ucfirst($parent)}}"
>
    <div class="collapsible__close d-flex">
        <x-input.close :data="[
        'bs-toggle' => 'collapse',
        'bs-target' => '#js' . ucfirst($type),
        ]" />
    </div>
    {{ $slot }}
</{{$isListItem}}>

