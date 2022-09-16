<?php

namespace App\Http\Livewire\Admin;

use App\Models\BudgetApproved;
use Livewire\Component;
use App\Models\Projects;
use App\Models\detailedEstimatePage;

class AdminProject extends Component
{
    public $projectId,$dataOne,$dataTwo,$datatree,$datafour,$barCharts,$dataOnes,$balanceBudget,$allottedBudget,$detailEstimates,$detailSumEstimates,$location;

    public function mount()
    {
        $this->projects = Projects::where('status','approved')->get();
        
        
        $this->getBarCharts();
    }
    public function updatedProjectId()
    {
        $this->getBarCharts();
    }
    public function getBarCharts()
    {   if($this->projectId != '')
        {
            $this->projectIds = 1;
            $this->allottedBudget = BudgetApproved::where('project_name',$this->projectId)->sum('budget_alloted');
            $laborBudget = BudgetApproved::where('project_name',$this->projectId)->sum('labor_consumed');
            $materialBudget = BudgetApproved::where('project_name',$this->projectId)->sum('material_consumed');
            $this->balanceBudget = BudgetApproved::where('project_name',$this->projectId)->sum('balance');
            $dataOne = $laborBudget;
            $dataTwo = $materialBudget;
            $datatree = $this->allottedBudget;
            $datafour = $this->balanceBudget;
            $this->detailEstimates = detailedEstimatePage::where('project_Id',  $this->projectId)->get();
            $this->detailSumEstimates =detailedEstimatePage::where('project_Id',  $this->projectId)->sum('sub_total');
            $this->locations= Projects::where('name_of_project',$this->projectId)->get();
            $this->dispatchBrowserEvent('chart', ['labor'=> $dataOne,'material' => $dataTwo,'alloted'=> $datatree,'balance'=>$datafour]);

         
        }else{
          
            $this->dispatchBrowserEvent('charts');
            $this->projectIds = null;
        }
    }
    
    public function render()
    {
        $projects = Projects::where('status','approved')->get();
        return view('livewire.admin.admin-project',[
            'projects' => $projects,
        ]);
    }
}
