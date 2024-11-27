<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearUsuario extends Component
{
    use WithFileUploads;
    public $userId;
    public $editMode = false;

    // Sent to database
    public $datas;
    public $name;
    public $apellido_paterno;
    public $apellido_materno;
    public $fecha;
    public $email;
    public $password;
    public $genero;
    public $rol;
    public $telefono;
    public $imagen;
    public $imagen_nueva;

    public function getRules()
    {
        return [
            'name' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha' => 'required',
            'email' => 'required|email',
            'password' => $this->editMode ? 'nullable|min:8' : 'required|min:8',
            'genero' => 'required',
            'rol' => 'required',
            'telefono' => 'required',
            'imagen' => 'nullable|image|max:2048',
        ];
    }

    public function mount($user = null)
    {
        $generos = public_path('js/generos.json');
        $this->datas = json_decode(file_get_contents($generos), true);

        if ($user) {
            $this->editMode = true;

            // find ther user with the id
            $this->userId = $user->id;

            // set the values
            $this->name = $user->name;
            $this->apellido_paterno = $user->apellido_paterno;
            $this->apellido_materno = $user->apellido_materno;
            $this->fecha = $user->fecha;
            $this->email = $user->email;
            $this->genero = $user->genero;
            $this->rol = $user->rol;
            $this->telefono = $user->telefono;
            $this->imagen = $user->imagen;
        } else {
            $this->editMode = false;
        }
    }

    public function createUser()
    {
        $datos = $this->validate($this->getRules());
        if ($this->editMode && $this->userId) {
            return $this->editUser($datos);
        } else {
            $imagen = $this->imagen->store('public/users-profile');
            $datos['imagen'] = str_replace('public/users-profile/', '', $imagen);
            $user = User::create([
                'name' => $datos['name'],
                'apellido_paterno' => $datos['apellido_paterno'],
                'apellido_materno' => $datos['apellido_materno'],
                'fecha' => $datos['fecha'],
                'email' => $datos['email'],
                'password' => bcrypt($datos['password']),
                'genero' => $datos['genero'],
                'rol' => $datos['rol'],
                'telefono' => $datos['telefono'],
                'imagen' => $datos['imagen'],
            ]);
        }

        session()->flash('message', 'Usuario creado exitosamente');
        return redirect()->route('admin.index');
    }

    public function editUser($datos)
    {
        $user = User::find($this->userId);

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/users-profile');
            $datos['imagen'] = str_replace('public/users-profile/', '', $imagen);
        } else {
            $datos['imagen'] = $this->imagen;
        }

        if (!empty($this->password)) {
            $datos['password'] = bcrypt($this->password);
        } else {
            unset($datos['password']);
        }

        $user->update($datos);
        session()->flash('message', 'Usuario actualizado exitosamente');
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.crear-usuario', [
            'generos' => $this->datas['generos'],
            'roles' => $this->datas['roles'],
        ]);
    }
}