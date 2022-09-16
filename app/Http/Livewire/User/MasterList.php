<?php

namespace App\Http\Livewire\User;
use App\Models\User;
use App\Models\detailedEstimatePage;
use App\Models\Projects;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use function PHPUnit\Framework\isEmpty;

class MasterList extends Component
{
 

    public $invoiceDetail,$amountLabor,$projectEstimateId,$descriptionEstmate;
    public $state = [];


       //---Create project---//
       public function createDetailedEstimatesPage()
       {
           $validatedData = Validator::make($this->state, [
               'projectId' => 'required',
               'description' => 'required',
               'itemNumber'=> 'required',
               'quantity' => 'required',
               'unitId' => 'required',
         
   
           ])->validate();
       
           $newPage = new detailedEstimatePage;
            $newPage->project_Id = $validatedData['projectId'];
            $newPage->description = $validatedData['description'];
            $newPage->item_Number = $validatedData['itemNumber'];
            $newPage->quantity = $validatedData['quantity'];
            $newPage->unit_id = $validatedData['unitId'];
            $newPage->sub_total = 0;
            $newPage->user_name = auth()->user()->userName;
            $newPage->save();
           $this->dispatchBrowserEvent('hide-form', ['message'=> 'created page successfully! You can now start to add new detailed estimates']);
         
       }
 

    public function render()
    {   
        $this->projects = Projects::where('user_name',auth()->user()->userName)->where('status',null)->get();

            
      
            $detailEstimatePage =  DetailedEstimatePage::where('user_name',auth()->user()->userName)->get();


        return view('livewire.user.masterList',[
            'detailEstimatePages' =>$detailEstimatePage,
            'projects' => $this->projects,
           
         ]);
    }
}
