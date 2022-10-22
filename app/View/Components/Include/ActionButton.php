<?php

namespace App\View\Components\Include;

use Illuminate\View\Component;

class ActionButton extends Component
{
    public $submit;
    public $reset;
    public $update;
    public $cancel;
    public $delete;
    public $edit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $submit = false, $reset = false, $update = false, $cancel = false, $delete = false, $edit = false)
    {
        $this->submit = $submit;
        $this->reset = $reset;
        $this->update = $update;
        $this->cancel = $cancel;
        $this->delete = $delete;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.include.action-button');
    }
}
