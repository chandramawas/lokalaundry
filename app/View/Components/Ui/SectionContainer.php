<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionContainer extends Component
{
    public string $id;
    public ?string $title;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $title = null)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.section-container');
    }
}
