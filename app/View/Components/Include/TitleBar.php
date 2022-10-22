<?php

namespace App\View\Components\Include;

use Illuminate\View\Component;

class TitleBar extends Component
{
    public $pageTitle;
    public $ajaxForm;
    public $backRoute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $pageTitle,$ajaxForm=false,$backRoute=false)
    {
        $this->pageTitle = $pageTitle;
        $this->ajaxForm = $ajaxForm;
        $this->backRoute = $backRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.include.title-bar');
    }
}
