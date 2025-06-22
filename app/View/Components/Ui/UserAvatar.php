<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserAvatar extends Component
{
    public ?string $avatar;
    public string $name;

    /**
     * Create a new component instance.
     */
    public function __construct($avatar = null, $name)
    {
        $this->avatar = $avatar;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.user-avatar');
    }
}
