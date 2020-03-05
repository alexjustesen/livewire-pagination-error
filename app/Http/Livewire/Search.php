<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\User;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $results = User::query()
            ->when($this->search, function($query) {
                return $query->where('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.search', [
            'results'   => $results,
        ]);
    }
}
