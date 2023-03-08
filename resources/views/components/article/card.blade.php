@props(['title' => '', 'quote' => ''])

<div class="card card--modal shadow p-3 p-md-4">
    <article class="article">
        <div class="row">
            <div class="col-md-6">
                <x-common.picture
                    cssClass="card-img-top"
                    :presets="[
                            \App\Helpers\Enums\ImagePresets::SECONDARY_1,
                            \App\Helpers\Enums\ImagePresets::SECONDARY_2,
                            \App\Helpers\Enums\ImagePresets::SECONDARY_3
                          ]"/>
            </div>
            <div class="col-md-6">
                <h2 class="article__title fs-4 text-capitalize">{{$title}}</h2>
                <div class="d-flex align-items-center gap-2 mt-3">
                    <span class="article__badge badge text-bg-success">
                        9.6
                    </span>
                    <span>115 ratings</span>
                </div>

                <address class="article__address mt-3 mb-0">
                    3535 Miskolc Tokaji FErenc utca 51. (Magyarország)
                </address>
                <figure class="blockquote mt-3">
                    <blockquote class="blockquote__text">{{$quote}}</blockquote>
                    <figcaption class="blockquote__reviewer">
                        reviewer name
                    </figcaption>
                </figure>
            </div>
        </div>
    </article>
</div>
