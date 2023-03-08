@props(["type" => "primaryModal", 'cssModifiers' => ["centered", "scrollable"]])

<div class="modal modal-{{implode(" modal-", $cssModifiers)}} fade"
     tabindex="-1"
     aria-labelledby="js{{ucfirst($type)}}Label"
     id="js{{ucfirst($type)}}"
     aria-hidden="true">
    <div class="modal__dialog modal-dialog">
        <div class="modal__content modal-content">
            <header class="modal__header modal-header">
                <h5 class="modal__title modal-title" id="js{{ucfirst($type)}}">@lang('modal.title')</h5>
                <div>
                    <x-input.close :data="['bs-dismiss' => 'modal']" />
                </div>
            </header>
            <section class="modal__body p-4">
                {{ $slot }}
            </section>
        <footer class="modal__footer modal-footer">
                <x-input.button :cssModifiers="['secondaryOutline', 'lg']"
                                :text="__('modal.button.close')"
                                :data="['bs-dismiss' => 'modal']"
                />
            </footer>
        </div>
    </div>
</div>
