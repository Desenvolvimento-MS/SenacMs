<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormUser extends Form
{
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $profile;
    public $cpf;

    public ?User $model = null;
    


  protected function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                $this->model ? Rule::unique('users')->ignore($this->model) : Rule::unique('users')
            ],
             'cpf' => [
                'required',
                $this->model ? Rule::unique('users')->ignore($this->model) : Rule::unique('users')
             ],
             'profile' => 'required',
             'password' => 'nullable',
        ];
    }


    public function store(){

        $this->validate();

        User::create([
           'name'=> $this->name,
           'lastname'=> $this->lastname,
           'email'=> $this->email,
           'profile'=> $this->profile,
           'cpf'=> $this->cpf,
           'password'=> $this->password,
        ]);

    }

    public function update(){

        $this->validate();

        if(empty($this->password)){

            $this->password = $this->model->password;
        }

        $this->model->update([
           'name'=> $this->name,
           'lastname'=> $this->lastname,
           'email'=> $this->email,
           'profile'=> $this->profile,
           'cpf'=> $this->cpf,
           'password'=> $this->password,
        ]);

    }


    public function setModel($model){

        $this->model = $model;

        $this->name = $model->name;
        $this->lastname = $model->lastname;
        $this->email = $model->email;
        $this->cpf = $model->cpf;
        $this->profile = $model->profile;

    }







}
