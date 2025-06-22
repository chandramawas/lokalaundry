<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFile extends Component
{
    public string $name;
    public ?string $label;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label = null, $class = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-file');
    }
}
