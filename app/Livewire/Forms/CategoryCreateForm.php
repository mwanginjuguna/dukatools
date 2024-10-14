<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryCreateForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);
    }
}
