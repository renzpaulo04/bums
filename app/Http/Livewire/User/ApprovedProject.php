<?php

namespace App\Http\Livewire\User;

use App\Models\BudgetApproved;
use Livewire\Component;
use App\Models\User;
use App\Models\Projects;
use Illuminate\Support\Facades\Validator;
class ApprovedProject extends Component

{
    public $projectId,$alloteds,$projects,$locations,$consume,$labor,$material;
    public function mount(Projects $consume)
    {
        $this->projects = Projects::where('user_name',auth()->user()->userName)->where('status','approved')->get();
        $this->getAlloteds();
        $this->getLocations();
        $this->consume = $consume;
    
        $this->approve = Projects::where('user_name',auth()->user()->userName)->get();
            $this->budgets = BudgetApproved::where('user_name',auth()->user()->userName)->get();

    }
    public function getAlloteds()
    {
        if($this->projectId != '')
        {
            $this->alloteds = BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)
            ->sum('balance');
        
        }else{
            $this->alloteds = 0;
            $this->locations = [];
        
        }
    }
    public function getLocations()
    {
        if($this->projectId != '')
        {
            $this->locations  = Projects::where('user_name',auth()->user()->userName)->where('status','approved')->where('name_of_project',$this->projectId)->get();

        }else{
            $this->locations = [];
        
        }
    }
    public function updatedAlloteds()
    {
        $this->getLocations();
    }
    public function updatedProjectId()
    {
        $this->getAlloteds();
        $this->getLocations();
       
    }
        //---------start update consume Project showing modal--------//
        public function ConsumeBudget()
        {
            $this->dispatchBrowserEvent('show-form');
        }  public function updated()
        {    
           
         
            if($this->consume->labor != '' && $this->consume->material != ''){
                $balancebudget = BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)->sum('balance');

                    $this->consume->consumeBudget = $this->consume->labor + $this->consume->material;
                    $this->consume->balance = $balancebudget - $this->consume->consumeBudget;
    
             } else{
                    $this->consume->consumeBudget =   0; 
                    $this->consume->balance = 0;
                }
    
        } 
        protected function rules(): array
        {
            
            return [
                'consume.labor' =>
                [
                    'numeric',
                    'required',
                ],
                'consume.material' =>
                [
                    'numeric',
                    'required',
                ],
                'consume.consumeBudget' =>
                [
                    'numeric',
                    'required',
                ],
                'consume.balance' =>
                [
                    'numeric',
                    'required',
                ],
             
    
            ];
        }
    public function updateConsume()
    {
        $clabor = BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)->sum('labor_consumed');
        $cmaterial = BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)->sum('material_consumed');
        $cbudget = BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)->sum('budget_consumed');
        $cbudgts = $this->consume->consumeBudget + $cbudget;
        $clabors = $this->consume->labor + $clabor;
        $cmaterials = $this->consume->material +  $cmaterial ;

        BudgetApproved::where('user_name',auth()->user()->userName)->where('project_name',$this->projectId)
        ->update(['budget_consumed' => $cbudgts,'labor_consumed' =>  $clabors,'balance' => $this->consume->balance,'material_consumed' =>  $cmaterials]);
     
        $this->dispatchBrowserEvent('hide-form',['message'=>'Updated successfully ']);
    }
    public function render()
    {
     
       
            $this->projects = Projects::where('user_name',auth()->user()->userName)->where('status','approved')->get();

        return view('livewire.user.approved-project',[
            'projects' =>$this->projects,
      
        ]);
    }
}
