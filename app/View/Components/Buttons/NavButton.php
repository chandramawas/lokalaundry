<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavButton extends Component
{
    // Props
    public ?string $href;
    public ?string $class;
    public bool $active;

    /**
     * Create a new component instance.
     */
    public function __construct($href = '#', $class = null)
    {
        $this->href = $href;
        $this->class = $class;
        $this->active = $href === url()->current();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.nav-button');
    }
}
