<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{

    public $breadcrumbs = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $url = request()->path(); // Ambil URL saat ini
        $segments = explode('/', $url); // Pecah URL berdasarkan "/"

        $fullUrl = '';
        foreach ($segments as $index => $segment) {
            $fullUrl .= '/' . $segment; // Buat URL kumulatif

            // Ubah slug jadi teks biasa
            $label = ucwords(str_replace('-', ' ', $segment));

            // Jika bagian terakhir, batasi panjang karakter
            if ($index == count($segments) - 1) {
                $label = strlen($label) > 15 ? substr($label, 0, 15) . '...' : $label;
            }

            $this->breadcrumbs[] = [
                'label' => $label,
                'url' => url($fullUrl)
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}
