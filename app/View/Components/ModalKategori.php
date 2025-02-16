<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalKategori extends Component
{
    public $modalId;
    public $modalTitle;
    public $modalRoute;
    public $modalMethod;
    public $id;
    public $kategori;
    public $methodUpdate;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $modalTitle, $modalRoute, $modalMethod, $id, $kategori, $methodUpdate)
    {
        $this->modalId = $modalId;
        $this->modalTitle = $modalTitle;
        $this->modalRoute = $modalRoute;
        $this->modalMethod = $modalMethod;
        $this->id = $id;
        $this->kategori = $kategori;
        $this->methodUpdate = $methodUpdate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-kategori');
    }
}
