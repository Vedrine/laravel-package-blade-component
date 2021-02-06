<?php

namespace Vedrine\PackageName\View\Components\Namespace;

use Illuminate\View\Component;

class Test extends Component
{
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('package-name::namespace.test');
    }
}
