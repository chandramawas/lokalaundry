<?php

namespace App\View\Components\Ui\Activity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Booking extends Component
{
    public string $code;
    public string $outlet;
    public string $machines;
    public string $date;
    public string $session;
    /**
     * Create a new component instance.
     */
    public function __construct($code, $outlet, $machines, $date, $session)
    {
        $this->code = $code;
        $this->outlet = $outlet;
        $this->machines = $machines;
        $this->date = $date;
        $this->session = $session;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.activity.booking');
    }
}
