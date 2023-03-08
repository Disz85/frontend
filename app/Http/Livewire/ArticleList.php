<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ArticleList extends Component
{
    public function __construct(public $articles)
    {
        $this->articles = collect(Http::get('https://jsonplaceholder.typicode.com/posts?_limit=3')->json());
    }

    public function loadMore()
    {

        $lastArticleId = $this->articles->last()['id'];

        $newArticles = collect(Http::get("https://jsonplaceholder.typicode.com/posts?_start={$lastArticleId}&_limit=3")->json());

        $this->articles = $this->articles->merge($newArticles);

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('livewire.article-list');
    }
}
