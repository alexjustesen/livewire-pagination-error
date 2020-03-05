<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\User;

class Search extends Component
{
    use WithPagination;

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

    public function paginationView()
    {
        return 'vendor.pagination.simple-default';
    }
}
