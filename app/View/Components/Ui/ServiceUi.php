<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceUi extends Component
{
    // Props
    public string $icon;
    public string $descDisplay;
    public string $descBody;

    /**
     * Create a new component instance.
     */
    public function __construct($icon, $descDisplay, $descBody)
    {
        $this->icon = $icon;
        $this->descDisplay = $descDisplay;
        $this->descBody = $descBody;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.service-ui');
    }
}
