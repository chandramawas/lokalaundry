<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OutletUi extends Component
{
    public string $name;
    public string $address;
    public string $phone;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $address, $phone)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.outlet-ui');
    }
}
