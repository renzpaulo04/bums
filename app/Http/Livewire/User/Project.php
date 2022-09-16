<?php

namespace App\Http\Livewire\User;

use Livewire\Component;


use App\Models\User;
use App\Models\Projects;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Process\Process;

class Project extends Component
{
    public $state = [];
    //---------start Add New Project showing modal--------//
    public function addNewProject()
    {
        $this->dispatchBrowserEvent('show-form');
    }
    //---Create project---//
    public function createProject()
    {
        $validatedData = Validator::make($this->state, [
            'name_of_project' => 'required',
            'location' => 'required',
      

        ])->validate();

        $newProjects = new Projects;
        
        $newProjects->name_of_project = $validatedData['name_of_project'];
        $newProjects->location = $validatedData['location'];
        $newProjects->user_name = auth()->user()->userName;
        $newProjects->save();
 
        $this->dispatchBrowserEvent('hide-form', ['message'=> 'Added successfully! You can now start create a master list']);

        return redirect()->back();

    }
//---------End Add New project modal--------//
   //------------Update Selected Page Rows-----------//

    public function render()
    {
        $projects = Projects::where('user_name',auth()->user()->userName)->get();
        return view('livewire.user.Project',[
            'projects' =>$projects,
        ]);
    }
}
