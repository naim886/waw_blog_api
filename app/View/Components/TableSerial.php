<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class TableSerial extends Component
{

    public int $serial;
    public object $model;

    /**
     * Create a new component instance.
     */
    public function __construct(int $serial, object $model)
    {
        $this->serial = $serial;
        $this->model  = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-serial');
    }
}
