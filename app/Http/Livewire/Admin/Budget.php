<?php

namespace App\Http\Livewire\Admin;

use App\Models\Projects;
use App\Models\detailedEstimatePage;
use App\Models\User;
use App\Models\BudgetApproved;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Budget extends Component
{
    public $state = [];

    public $project,$showDetailModal = false,$newBudgetModal=false, $projectId,$detailsums;
    public $details =[];
    public $budget =[];
 
   

    public function addNewBudget()
    {
        $this->newBudgetModal = true;
        $this->showDetailModal = false;
        $this->dispatchBrowserEvent('show-form');
    }
    public function viewProject(Projects $project)
    {
        $this->showDetailModal = true;
        $this->newBudgetModal = false;
        $this->project = $project;
        $this->details = $project->toArray();
        $this->validatedData = Validator::make($this->details,[
            'name_of_project' => 'required',
            'user_name' => 'required',
            'location' => 'required',
            'status' => 'required',
        ])->validate();
        $this->dispatchBrowserEvent('show-form');
        $this->detailed = detailedEstimatePage::where('project_Id', $this->validatedData['name_of_project'])->get();
        $this->nameContractors = User::where('userName',$this->validatedData['user_name'])->get();
        $this->projectdetails = Projects::where('user_name',$this->validatedData['user_name'])->where('status','request')->get();
        $this->detailedSum = detailedEstimatePage::where('project_Id', $this->validatedData['name_of_project'])->sum('sub_total');
    }
    public function mount()
    {
        $this->projectBudget = Projects::where('status','request')->get();
        $this->getDetailsums();
    
     
    }
    public function updatedProjectId()
    {
        $this->getDetailsums(); 
    }

    public function getDetailsums(){
        if($this->projectId != '')
        {
            $this->detailsums =  detailedEstimatePage::where('project_Id', $this->projectId)->sum('sub_total') ;
        }
        else{
         $this->detailsums = '0';
        }
    }
    public function createBudget()
    {
        $validatedData = Validator::make($this->budget, [
            'projectId' => 'required',
            'number_of_budget' => 'required',
        ])->validate();
        $this->budgetApproved = Projects::where('name_of_project',$validatedData['projectId'])->pluck('user_name')->toArray();
        $this->budgetId = implode('',$this->budgetApproved);
        $newPage = new BudgetApproved;
         $newPage->project_name = $validatedData['projectId'];
         $newPage->budget_alloted = $validatedData['number_of_budget'];
         $newPage->user_name = $this->budgetId ;
         $newPage->budget_consumed = 0;
         $newPage->labor_consumed = 0;
         $newPage->material_consumed = 0;
         $newPage->balance = $validatedData['number_of_budget'];
         $newPage->save();
         Projects::where('name_of_project', $validatedData['projectId'])->update(['status' => 'approved']);
        $this->dispatchBrowserEvent('hide-form', ['message'=> 'Approved project and successfuly add a budget!']);
    }
   
    public function render()
    {
        $projects = Projects::where('status','request')->get();
        return view('livewire.admin.budget',[
            'projects' => $projects,
        ]);
    }
}
