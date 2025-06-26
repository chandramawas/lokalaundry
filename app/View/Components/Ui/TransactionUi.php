<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TransactionUi extends Component
{
    public ?string $href;
    public string $title;
    public ?string $subtitle;
    public string $date;
    public string $amount;
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct($href = null, $title, $subtitle = null, $date, $amount, $variant = 'income')
    {
        $this->variant = $variant;
        $this->href = $href;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->date = $date;
        $this->amount = $amount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.transaction-ui');
    }
}
