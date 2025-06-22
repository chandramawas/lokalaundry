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
    public ?string $class;
    public ?string $rows;
    public ?string $prefix;
    public bool $autofocus;
    public bool $readonly;
    public bool $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label = null, $type = 'text', $placeholder = null, $value = null, $class = null, $rows = '3', $prefix = null, $autofocus = false, $readonly = false, $disabled = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
        $this->rows = $rows;
        $this->prefix = $prefix;
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
