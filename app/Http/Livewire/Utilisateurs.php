<?php

namespace App\Http\Livewire;


use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isBtnAddClicked = false;

    public function render()
    {
            $user = User::paginate(5);

        return view('livewire.utilisateurs.index',['users'=>$user])
                ->extends("home.utilisateurs")
                ->section('body');

    }

    public function goToAddUser()
    {
        $this->isBtnAddclcked = true;
    }
}
