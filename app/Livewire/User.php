<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{   
    public $pilihanMenu = 'lihat';
    public $nama;
    public $email;
    public $peran;
    public $password;


    public function simpan(){
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'peran' => 'required',
            'password' => 'required'
        ],[
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format harus email',
            'email.unique' => 'Email telah digunakan',
            'peran.required' => 'Peran harus dipilih',
            'password.required' => 'Password harus diisi'
        ]);

        $simpan = new ModelsUser();
        $simpan ->name = $this->nama ;
        $simpan ->email = $this->email ;
        $simpan ->password =  bcrypt($this->password)  ;
        $simpan ->peran = $this->peran ;
        $simpan->save();
        $this->reset(['nama','email','password','peran']);
        $this->pilihanMenu = 'lihat';
            
      
    }
    

    public function pilihMenu($menu){
        $this->pilihanMenu = $menu;
    }
    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna' => ModelsUser::all()
        ]);
    }
}
