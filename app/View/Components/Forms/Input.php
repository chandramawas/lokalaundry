<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public ?string $label;
    public ?string $type;
    public ?string $placeholder;
    public ?string $value;
    public ?string $rows;
    public bool $autofocus;
    public bool $readonly;
    public bool $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label = null, $type = 'text', $placeholder = null, $value = null, $rows = '3', $autofocus = false, $readonly = false, $disabled = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->rows = $rows;
        $this->autofocus = $autofocus;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
