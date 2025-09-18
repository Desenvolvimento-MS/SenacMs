<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUser;
use App\Models\Sale;
use App\Models\User as ModelsUser;
use App\OpenAndClose;
use Livewire\Component;

class User extends Component
{



    use OpenAndClose;


    public $totalUser;
    public $totalAdm;
    public $totalSaller;
    public $totalCheck;

    public $users;

    public $userItem;

    public FormUser $form;



    public function mount(){

        $this->users = ModelsUser::all();
    }

    public function typeForm($id=null, $type=null){

        $this->openModal();
        
        if($type == 'update'){
            $this->updateFom =true;
            $this->userItem = ModelsUser::find($id);
            $this->form->setModel(ModelsUser::find($id));
        }else{
            $this->form->reset();
        }
    }


    public function register(){

        $this->form->cpf = preg_replace('/\D/', '', $this->form->cpf);


        $this->form->store();

        session()->flash('Sucess', 'Cadastrado com sucesso');
        $this->redirectRoute('users');
    }

    public function update(){

        $this->form->cpf = preg_replace('/\D/', '', $this->form->cpf);

        $this->form->update();

        session()->flash('Sucess', 'Editado com sucesso');
        $this->redirectRoute('users');
    }


    public function delete($id){

        $model = ModelsUser::find($id);

        if(Sale::where('user_id', $model->id)->count() >= 1){
             session()->flash('Error', 'Não é possivel deletar esse usuário pois ele já efetuou uma venda');
            return false;
        }

        $model->delete();
        
        session()->flash('Sucess', 'Deletado com sucesso');
        $this->redirectRoute('users');
    }





    public function render()
    {

        $model = ModelsUser::all();
        $this->totalUser = $model->count();
        $this->totalAdm = $model->where('profile','Adm')->count();
        $this->totalCheck = $model->where('profile','Check')->count();
        $this->totalSaller = $model->where('profile','Saller')->count();

        $query = ModelsUser::query();
        if($this->search){

            $query->whereAny([
                'name',
                'lastname',
                'email',
            ], 'like', "%{$this->search}%");
        }

        $this->users = $query->get();
      
        return view('livewire.user')
            ->layout('layout.app');
    }
}
