<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Closure;

class TableHeadItem extends Component
{
    public string $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-head-item');
    }
}
