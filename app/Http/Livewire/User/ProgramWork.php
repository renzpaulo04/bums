<?php

namespace App\Http\Livewire\User;
use App\Models\User;
use App\Models\ListLabor;
use App\Models\ListEquipment;
use App\Models\ListFos;
use App\Models\ListMaterial;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Projects;
use App\Models\detailedEstimatePage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;


class ProgramWork extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

     public $invoiceDetail,$projectEstimateId,$descriptionEstimate,$descriptionLabor,$descriptionEquipment,$descriptionFos,$descriptionMaterial;
     public $unitFos,$unitMaterial,$showlabor = false,$showmaterial = false,$showfos = false,$showequipment = false, $showViewModal = false,$ProgramName,$nop;
     public $labor = [];
     public $submit,$loc;
     public  $equipment= [];
     public $fos = [];
     public $material = [];
    
     public $work =[];

     public function mount(User $invoiceDetail)
     {
        
            $this->programs = Projects::where('user_name',auth()->user()->userName)->where('status',null)->get();


        if($this->projectEstimateId == ''){
            $this->descriptionids = [];
        }
     
         $this->invoiceDetail = $invoiceDetail;
         $this->getDescriptions();
         
 
      
     }
     public function addLabor() 
     {
        
        $validatedLabor= Validator::make($this->labor, [
             'descriptionLabor' => 'required',
         ])->validate();
 
         $newLabors = new ListLabor;
         $newLabors->project_name = $this->projectEstimateId;
         $newLabors->description = $this->descriptionEstimate;
         $newLabors->description_labor = $validatedLabor['descriptionLabor'];
         $newLabors->number_labor = $this->invoiceDetail->numberLabor;
         $newLabors->no_of_days = $this->invoiceDetail->numberOfDays;
         $newLabors->rate_day = $this->invoiceDetail->rateDay;
         $newLabors->amount = $this->invoiceDetail->amountLabor;
         $newLabors->user_name = auth()->user()->userName;
         $newLabors->save();


         $getSubTotal = detailedEstimatePage::where('user_name',auth()->user()->userName)
         ->where('project_Id',$this->projectEstimateId)
         ->where('description',$this->descriptionEstimate)->get();
         foreach($getSubTotal as $minitotal)
         {
            $id = $minitotal['id'];
            $subtotal = $minitotal['sub_total'];
         }
         $subtotals = $subtotal + $this->invoiceDetail->amountLabor;
         detailedEstimatePage::where('id','=',$id )->update(['sub_total' => $subtotals ]);
         $this->dispatchBrowserEvent('timeOverDue-confirmation',['message'=>'added successfully ']);

     }
     public function addEquipment() 
     {
        
         $validatedEquipment = Validator::make($this->equipment, [
             'descriptionEquipment' => 'required',
         ])->validate();
 
         $newEquips = new ListEquipment;
         $newEquips->project_name = $this->projectEstimateId;
         $newEquips->description = $this->descriptionEstimate;
         $newEquips->description_equipment = $validatedEquipment['descriptionEquipment'];
         $newEquips->number_equipment = $this->invoiceDetail->numberEquipment;
         $newEquips->equip_days = $this->invoiceDetail->equipDays;
         $newEquips->rental_day = $this->invoiceDetail->rentalDay;
         $newEquips->amount = $this->invoiceDetail->amountEquipment;
         $newEquips->user_name = auth()->user()->userName;
         $newEquips->save();

         $getSubTotal = detailedEstimatePage::where('user_name',auth()->user()->userName)
         ->where('project_Id',$this->projectEstimateId)
         ->where('description',$this->descriptionEstimate)->get();
         foreach($getSubTotal as $minitotal)
         {
            $id = $minitotal['id'];
            $subtotal = $minitotal['sub_total'];
         }
         $subtotals = $subtotal + $this->invoiceDetail->amountEquipment;
         detailedEstimatePage::where('id','=',$id )->update(['sub_total' => $subtotals ]);
         $this->dispatchBrowserEvent('timeOverDue-confirmation',['message'=>'added successfully ']);

     }
     public function addFos() 
     {
        
         $validatedFos = Validator::make($this->fos, [
             'descriptionFos' => 'required',
             'unitFos' => 'required',
         ])->validate();
 
  
         $newFos = new  ListFos;
         $newFos->project_name = $this->projectEstimateId;
         $newFos->description = $this->descriptionEstimate;
         $newFos->description_fos = $validatedFos['descriptionFos'];
         $newFos->unit = $validatedFos['unitFos'];
         $newFos->quantity = $this->invoiceDetail->quantityFos;
         $newFos->unit_cost = $this->invoiceDetail->unitCostFos;
         $newFos->amount = $this->invoiceDetail->amountFos;
         $newFos->user_name = auth()->user()->userName;
         $newFos->save();
         
         $getSubTotal = detailedEstimatePage::where('user_name',auth()->user()->userName)
         ->where('project_Id',$this->projectEstimateId)
         ->where('description',$this->descriptionEstimate)->get();
         foreach($getSubTotal as $minitotal)
         {
            $id = $minitotal['id'];
            $subtotal = $minitotal['sub_total'];
         }
         $subtotals = $subtotal + $this->invoiceDetail->amountFos;
         detailedEstimatePage::where('id','=',$id )->update(['sub_total' => $subtotals ]);

         $this->dispatchBrowserEvent('timeOverDue-confirmation',['message'=>'added successfully ']);

     }
     public function addMaterials() 
     {
        
         $validatedMaterial = Validator::make($this->material, [
             'kindMaterial' => 'required',
             'unitMaterial' => 'required',
         ])->validate();
 
         $newMaterial = new ListMaterial;
         $newMaterial->project_name = $this->projectEstimateId;
         $newMaterial->description = $this->descriptionEstimate;
         $newMaterial->description_material = $validatedMaterial['kindMaterial'];
         $newMaterial->unit = $validatedMaterial['unitMaterial'];
         $newMaterial->quantity = $this->invoiceDetail->quantityMaterial;
         $newMaterial->unit_cost = $this->invoiceDetail->unitCostMaterial;
         $newMaterial->amount = $this->invoiceDetail->amountMaterial;
         $newMaterial->user_name = auth()->user()->userName;
         $newMaterial->save();

         $getSubTotal = detailedEstimatePage::where('user_name',auth()->user()->userName)
         ->where('project_Id',$this->projectEstimateId)
         ->where('description',$this->descriptionEstimate)->get();
         foreach($getSubTotal as $minitotal)
         {
            $id = $minitotal['id'];
            $subtotal = $minitotal['sub_total'];
         }
         $subtotals = $subtotal + $this->invoiceDetail->amountMaterial;
         detailedEstimatePage::where('id','=',$id )->update(['sub_total' => $subtotals ]);
         
         $this->dispatchBrowserEvent('timeOverDue-confirmation',['message'=>'added successfully ']);

     }
     public function addNewLabor()
     {

         $this->showlabor = true;
         $this->showmaterial =false;
         $this->showfos = false;
         $this->showequipment = false;
         $this->showViewModal = false;
         $this->dispatchBrowserEvent('show-form');
     }
     public function addNewEquipment()
     {
        $this->showequipment = true;
        $this->showlabor = false;
        $this->showmaterial =false;
        $this->showfos =false;
        $this->showViewModal = false;
         $this->dispatchBrowserEvent('show-form');
     }
     public function addNewFos()
     {
        $this->showfos = true;
        $this->showmaterial =false;
        $this->showlabor = false;
        $this->showequipment = false;
        $this->showViewModal = false;
         $this->dispatchBrowserEvent('show-form');
     }
     public function addNewMaterial()
     {
        $this->showmaterial  = true;
        $this->showlabor = false;
        $this->showequipment = false;
        $this->showfos = false;
        $this->showViewModal = false;
         $this->dispatchBrowserEvent('show-form');
     }

     public function viewStatus(Projects $ProgramName)
     {
        $this->showViewModal = true;
        $this->showmaterial  = false;
        $this->showlabor = false;
        $this->showequipment = false;
        $this->showfos = false;
        $this->ProgramName = $ProgramName;
        $this->work = $ProgramName->toArray();
        $this->detailSumEstimate = detailedEstimatePage::where('user_name',auth()->user()->userName)
         ->where('project_Id',$this->work['name_of_project'])->sum('sub_total');
        $this->detailEstimates = detailedEstimatePage::where('user_name',auth()->user()->userName)
        ->where('project_Id',$this->work['name_of_project'])->get();
        $this->nop = $this->work['name_of_project'];
        $this->loc = $this->work['location'];
        $this->dispatchBrowserEvent('show-form');
    
     }
     public function submit()
     {
       Projects::where('user_name',auth()->user()->userName)
        ->where('name_of_project', $this->nop)->where( 'location',$this->loc)->update(['status' => 'request' ]);
        $this->dispatchBrowserEvent('hide-form', ['message'=> 'Successfully! send a request']);
     }
   
     public function updatedProjectEstimateId(){
        $this->getDescriptions();

       }
    public function getDescriptions(){
        if($this->projectEstimateId != '')
        {
            $this->descriptionids = DetailedEstimatePage::where('project_Id', $this->projectEstimateId)->get();
         
        }
        else{
            $this->descriptionids = [];
        }
        
    }

     public function updated()
     {    
        
         //--Labor calculation--//
         if($this->invoiceDetail->numberLabor != '' && $this->invoiceDetail->numberOfDays != '' && $this->invoiceDetail->rateDay != ''){
  
                 $convertToString=  $this->invoiceDetail->numberLabor * $this->invoiceDetail->numberOfDays * $this->invoiceDetail->rateDay;
                
                 $this->invoiceDetail->amountLabor = $convertToString  ;
          } else{
                 $this->invoiceDetail->amountLabor =   0; 
             }
 
         //--Equipment calculation--//
         if($this->invoiceDetail->numberEquipment != '' && $this->invoiceDetail->equipDays != '' && $this->invoiceDetail->rentalDay != ''){
  
             $this->invoiceDetail->amountEquipment = $this->invoiceDetail->numberEquipment * $this->invoiceDetail->equipDays * $this->invoiceDetail->rentalDay;
               
          } else{
                 $this->invoiceDetail->amountEquipment =   0; 
             }
 
         //--Fuel, oil and spareparts calculation--//
         if($this->invoiceDetail->quantityFos != '' && $this->invoiceDetail->unitCostFos != ''){
  
             $this->invoiceDetail->amountFos = $this->invoiceDetail->quantityFos * $this->invoiceDetail->unitCostFos;
               
          } else{
                 $this->invoiceDetail->amountFos =   0; 
             }
 
         //--Materials calculation--//
         if($this->invoiceDetail->quantityMaterial != '' && $this->invoiceDetail->unitCostMaterial != ''){
  
             $this->invoiceDetail->amountMaterial = $this->invoiceDetail->quantityMaterial * $this->invoiceDetail->unitCostMaterial;
               
          } else{
                 $this->invoiceDetail->amountMaterial =   0; 
             }
     }
     protected function rules(): array
     {
         
         return [
             'invoiceDetail.numberLabor' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.numberOfDays' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.amountLabor' =>
             [
                 'string',
                 'required',
             ],
             'invoiceDetail.rateDay' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.numberEquipment' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.equipDays' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.rentalDay' =>
             [
                 'string',
                 'required',
             ],
             'invoiceDetail.amountEquipment' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.quantityFos' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.unitCostFos' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.amountFos' =>
             [
                 'string',
                 'required',
             ],
             'invoiceDetail.quantityMaterial' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.unitCostMaterial' =>
             [
                 'numeric',
                 'required',
             ],
             'invoiceDetail.amountMaterial' =>
             [
                 'numeric',
                 'required',
             ],
 
 
         ];
     }

    public function view(Project $ProgramName)
    {
     
        $this->ProgramName= $ProgramName;
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        
        $this->detailEstimates = detailedEstimatePage::where('user_name',auth()->user()->userName)
        ->where('project_Id',  $this->nop)->get();
        $this->detailSumEstimate = detailedEstimatePage::where('user_name',auth()->user()->userName)
        ->where('project_Id',$this->nop)->sum('sub_total');
       
  
        $listLabor = ListLabor::where('user_name',auth()->user()->userName)->get();
        $listEquipment = ListEquipment::where('user_name',auth()->user()->userName)->get();
        $listFos = ListFos::where('user_name',auth()->user()->userName)->get();
        $listMaterial = ListMaterial::where('user_name',auth()->user()->userName)->get();  

    
            $ProgramName = Projects::where('user_name',auth()->user()->userName)->where('status',null)->get();
            $ProgramOfWork = Projects::where('user_name',auth()->user()->userName)->where('name_of_project',$this->nop)->where('status',null)->get();

        return view('livewire.user.program-work',[
            'ProgramNames' => $ProgramName,
            'listLabors' => $listLabor,
            'listEquipments' => $listEquipment,
            'listFos' => $listFos,
            'listMaterials' => $listMaterial,
            'detailEstimates' => $this->detailEstimates,
            'detailSumEstimates' => $this->detailSumEstimate,
            'programOfWorks' => $ProgramOfWork,
        ]);
    }
}
