<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextButton extends Component
{
    // Props
    public ?string $href;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct($href = '#', $class = null)
    {
        $this->href = $href;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.text-button');
    }
}
