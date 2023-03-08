<section class="articleList">
    <ul class="articleList__list row" id="jsCollapseArticles">
        @php
            $orderNumber = 1;
        @endphp
        @foreach($articles as $index => $article)
            @php
                $orderNumber = (($index + 1) % 3 === 1) ? $orderNumber + 4 : $orderNumber + 1;
            @endphp
            <x-common.collapsible
                type="collapseArticle-{{$loop->iteration}}"
                buttonCssClass="articleList__item articleList__item--order-md-{{$orderNumber - 4}} col-md-4"
                itemCssClass="articleList__item articleList__item--order-md-{{$orderNumber}} col-md-12 mb-4"
                listItem>
                <x-slot name="button">
                    <x-article.index :title="$article['title']"/>
                </x-slot>
                <x-article.card :title="$article['title']" :quote="$article['body']" />
            </x-common.collapsible>
        @endforeach
    </ul>

    <div class="d-grid">
        <x-input.button wire:click="loadMore"
                        target="primaryModal"
                        :cssModifiers="['secondary','outline', 'lg']"
                        :text="__('home.buttons.more_result')"
        >
            <span wire:loading wire:target="loadMore">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </span>
        </x-input.buttom>
    </div>
</section>
