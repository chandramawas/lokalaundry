<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MachinePrice extends Component
{
    public string $title;
    public string $price;
    public ?string $width;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $price, $width = 'w-full')
    {
        $this->title = $title;
        $this->price = $price;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.machine-price');
    }
}
