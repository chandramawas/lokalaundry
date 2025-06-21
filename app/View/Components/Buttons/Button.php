<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    // Props
    public ?string $href;
    public ?string $class;
    public ?string $type;
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct($href = null, $class = null, $type = 'button', $variant = 'primary')
    {
        $this->href = $href;
        $this->type = $type;
        $this->class = $class;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.button');
    }
}
