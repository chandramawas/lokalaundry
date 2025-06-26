<?php

namespace App\View\Components\Ui\Activity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    public string $code;
    public bool $status;
    public string $productsTotal;
    /**
     * Create a new component instance.
     */
    public function __construct($code, $status, $productsTotal)
    {
        $this->code = $code;
        $this->status = $status;
        $this->productsTotal = $productsTotal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.activity.product');
    }
}
