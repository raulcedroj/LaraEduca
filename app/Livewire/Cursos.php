<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Cursos extends Component
{
    public $cursos, $curso, $open_edit = false, $open_create = false, $cursoId, $users;

    public $selectedCurso = null;

    public $cursoCreate = [
        'nombre' => '',
        'user_id' => ''
    ];

    public $cursoEdit = [
        'nombre' => '',
        'user_id' => ''
    ];

    protected $rules = [
        'curso.nombre' => 'required|string',
        'curso.user_id' => 'required|exists:users,id'
    ];

    public function mount()
    {
        $this->cursos = Curso::orderBy('id')->get();
        $this->curso = new Curso();
        $this->users = User::all();
    }

    public function create()
    {
        
        Curso::create([
            'nombre' => $this->cursoCreate['nombre'],
            'user_id' => $this->cursoCreate['user_id']
        ]);

        $this->reset('curso');
        $this->open_create = false;
        toastr()->success('Curso created successfully!', ' ');
    }

    public function edit($cursoId)
    {
        $this->selectedCurso = Curso::find($cursoId);
        $this->cursoEdit['nombre'] = $this->selectedCurso->nombre;
        $this->cursoEdit['user_id'] = $this->selectedCurso->user_id;
        $this->open_edit = true;
    }

    public function update(){
        $curso = Curso::find($this->selectedCurso->id);

        $curso->update([
            'nombre' => $this->cursoEdit['nombre'],
            'user_id' => $this->cursoEdit['user_id'],
        ]);

        $this->closeModals();
        toastr()->success('Curso updated successfully!',' ');
    }


    public function delete($cursoId)
    {
        $curso = Curso::find($cursoId);
        $curso->delete();
        toastr()->success('Curso deleted successfully!', ' ');
    }

    public function closeModals()
    {
        $this->open_edit = false;
    }

    public function render()
    {
        $this->cursos = Curso::orderBy('id')->get();
        return view('livewire.cursos');
    }
}
