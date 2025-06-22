<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerFeedback extends Component
{
    public ?string $name;
    public ?string $createdAt;
    public ?string $avatar;

    /**
     * Create a new component instance.
     */
    public function __construct($name = 'Unknown', $createdAt = 'unknown', $avatar = null)
    {
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.customer-feedback');
    }
}
