<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminPanel extends Component
{

    public $users, $open_edit = false, $user, $userId, $roles;

    public $selectedUser = null;

    public $userEdit = [
        'name' => '',
        'email' => '',
        'role_id' => null
    ];

    public function edit($userId)
    {

        $this->selectedUser = User::find($userId);
        $this->userEdit['name'] = $this->selectedUser->name;
        $this->userEdit['email'] = $this->selectedUser->email;
        $this->userEdit['role_id'] = $this->selectedUser->roles->pluck('id')->toArray();
        $this->open_edit = true;
    }

    public function update(){
        $user = User::find($this->selectedUser->id);

        $user->update([
            'name' => $this->userEdit['name'],
            'email' => $this->userEdit['email'],
        ]);

        $user->roles()->sync($this->userEdit['role_id']);

        $this->closeModals();
        //$this->reset(['name', 'email']);
    }

    public function delete($userId)
    {
        $user = User::find($userId);
        $user->posts()->delete();
        $user->delete();

    }

    public function mount(){
        $this->users = User::orderBy('name')->get(); 
        $this->roles = Role::all();
    }

    public function closeModals()
    {
        $this->open_edit = false;
    }

    public function render()
    {

        $this->users = User::orderBy('name')->get();
        
        return view('livewire.admin-panel');
    }
}
