<?php

namespace Crankd\RapidUI\View\Components\Layout;

use Illuminate\View\Component;

class Stacked extends Component
{

    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icons = [])
    {
        $this->links = $this->getConfig('navigation.links');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('rapid::components.layout.stacked');
    }

    public function getConfig($option)
    {
        return json_decode(json_encode(config('rapid-ui.navigation.links')));
    }
}
