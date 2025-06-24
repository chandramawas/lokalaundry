<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MachineUi extends Component
{
    public string $number;
    public ?string $type;
    public ?string $capacity;
    public ?string $status;
    public bool $loading;

    /**
     * Create a new component instance.
     */
    public function __construct($number, $type = 'w', $capacity = null, $status = 'available', $loading = false)
    {
        $this->number = $number;
        $this->type = $type;
        $this->capacity = $capacity;
        $this->status = $status;
        $this->loading = $loading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.machine-ui');
    }
}
