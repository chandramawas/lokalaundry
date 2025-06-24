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
        $path = trim(parse_url($href, PHP_URL_PATH), '/');

        if ($path === '') {
            // Khusus untuk Home
            $this->active = request()->is('/');
        } else {
            // Untuk route lain
            $this->active = request()->is($path . '*');
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.nav-button');
    }
}
