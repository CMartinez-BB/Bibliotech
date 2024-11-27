<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowUsersTable extends Component
{
    protected $listeners = ['deleteUser'];

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        // Get the users except the admin
        $users = User::where('id', '!=', Auth::id())->get();
        return view('livewire.admin.show-users-table', [
            'users' => $users,
        ]);
    }
}
