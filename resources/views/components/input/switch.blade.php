@props(['id' => 'switch', 'text' => ''])

<div class="switch form-check form-switch">
    <input class="switch__input form-check-input" type="checkbox" role="switch" id="{{$id}}">
    <label class="switch__label form-check-label" for="{{$id}}">{{$text}}</label>
</div>
