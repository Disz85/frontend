@extends('app')

@section('stylesheet')
    @vite(['resources/scss/pages/home/index.scss'])
@endsection

@section('content')
    <section class="home">
        <x-input.button target="primaryModal"
                        :cssModifiers="['primary', 'lg']"
                        :text="__('home.buttons.modal')"
                        :data="['bs-toggle' => 'modal']"
        />
        <x-common.modal type="primaryModal">
            <x-input.switch text="lorem ipsum sit dolor amet"/>
            <livewire:article-list />
        </x-common.modal>
    </section>
@endsection

