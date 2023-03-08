@props(['title' => ''])


<article class="article" {{ $attributes }}>
    <x-common.picture :presets="[
                    \App\Helpers\Enums\ImagePresets::PRIMARY_1,
                    \App\Helpers\Enums\ImagePresets::PRIMARY_2,
                    \App\Helpers\Enums\ImagePresets::PRIMARY_3
                  ]"/>
    <h2 class="article__title">{{$title}}</h2>
</article>
