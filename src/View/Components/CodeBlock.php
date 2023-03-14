<?php

namespace Crankd\RapidUI\View\Components;

use Illuminate\View\Component;

class CodeBlock extends Component
{


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $language = 'html'
    ) {
        $this->language = $language;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return function ($data) {

            // excape the blade tags <x- and </x-
            $str = str_replace(['<x-', '</x-'], ['&lt;x-', '&lt;/x-'], $data['slot']);


            return '<pre class="shadow-lg rounded-lg language-' . $this->language . '"><code>' .  $str . '</code></pre>';
        };
    }
}
