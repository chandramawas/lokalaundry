<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerFeedback extends Component
{
    public ?string $username;
    public ?string $createdAt;

    /**
     * Create a new component instance.
     */
    public function __construct($username = 'Unknown', $createdAt = 'unknown')
    {
        $this->username = $username;
        $this->createdAt = $createdAt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.customer-feedback');
    }
}
