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

    // Action Button
    public bool $button;
    public ?string $buttonLabel;
    public ?string $buttonHref;
    public ?string $buttonVariant;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $address, $phone, $button = false, $buttonLabel = "Booking Disini", $buttonHref = null, $buttonVariant = 'primary')
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->button = $button;
        $this->buttonLabel = $buttonLabel;
        $this->buttonHref = $buttonHref;
        $this->buttonVariant = $buttonVariant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.outlet-ui');
    }
}
