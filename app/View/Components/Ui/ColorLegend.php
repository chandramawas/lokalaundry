<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColorLegend extends Component
{
    public string $color;
    public string $label;

    /**
     * Create a new component instance.
     */
    public function __construct($color, $label)
    {
        $this->color = $color;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.color-legend');
    }
}
