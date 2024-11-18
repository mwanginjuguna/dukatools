<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Show extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.users.show');
    }
}
