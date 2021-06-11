<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class showRejectComponent extends Component
{
    public $id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.show-reject-component');
    }
}
