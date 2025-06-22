<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserAvatar extends Component
{
    public ?string $size;
    public ?string $avatar;
    /**
     * Create a new component instance.
     */
    public function __construct($size = 8, $avatar = null)
    {
        $this->size = $size;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.user-avatar');
    }
}
