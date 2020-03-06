<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\User;

class Search extends Component
{
    use WithPagination;

    public $search = '';

    public function updating($name, $value)
    {
        //list of Property changes in which that
        //page number needs to be set to
        //first page

        $changePagintionToOne = [
            'search',
        ];

            if(in_array($name,$changePagintionToOne)):
                $this->gotoPage(1);
            endif;
        return;
    }

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
        return 'vendor.pagination.simple-livewire';
    }
}
