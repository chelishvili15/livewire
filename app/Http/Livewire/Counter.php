<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment()
    {
        return $this->count++;
    }

    public function decrement()
    {
        return $this->count--;
    }
    
    public function render()
    {
        return view('livewire.counter', [
            'counter' => $this->count   // counter.blade.php გადასცემს ცვლადს $count
        ]);
    }
}
