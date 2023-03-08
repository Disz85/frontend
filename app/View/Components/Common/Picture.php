<?php

namespace App\View\Components\Common;

use App\Helpers\Enums\ImagePresets;
use Illuminate\View\Component;
use Illuminate\View\View;

class Picture extends Component
{
    public array $breakpoints = [576, 768, 1200];
    public array $formats = ['webp', 'jpeg'];



    public function __construct(
        public string $path = 'https://via.placeholder.com/',
        public string $alt = '',
        public string  $cssClass = '',
        public mixed  $figcaption = null,
        public array  $presets = [],
        public array  $lqip = ImagePresets::LQIP_SQUARE,
    )
    {
    }

    public function validatePresets()
    {
        if (sizeof($this->presets) !== sizeof($this->breakpoints)) {
            throw new \Exception('You must define a preset for every breakpoint in $breakpoints (total of: ' . sizeof($this->breakpoints) . ')');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.common.picture');
    }
}
