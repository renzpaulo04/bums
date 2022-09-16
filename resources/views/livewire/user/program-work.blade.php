<div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                 Program Work
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
          

                    <li class="breadcrumb-item active">Program  Work</li>
                </ol>
            </div>
        </div>
    </div>
</div>


    <!---------- button fucntion for detail estimates -------->

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">
    <div>
    <button wire:click="addNewLabor" class="btn btn-warning"><i class="fa fa-plus-circle mr-1"></i>
       Add labor
    </button>
    <button wire:click.prevent="addNewEquipment" class="btn btn-info"><i class="fa fa-plus-circle mr-1"></i>
       Add Equipment
    </button>
    <button wire:click.prevent="addNewFos" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>
       Add Fuel,oil, and sparerparts
    </button>
    <button wire:click.prevent="addNewMaterial" class="btn btn-success"><i class="fa fa-plus-circle mr-1"></i>
       Add materials
    </button>
 </div>
    

<!----------Start Modal for new labor -------->
<div class="modal fade"  id="form" value="labor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-xl" role="document">
        
            <form autocomplete="off" >
                <div class="modal-content">
                    <div class="modal-header bg-gradient-purple">
                    @if($showlabor)
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR LABOR</span>
                        </h5>
                    @elseif($showequipment)
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR EQUIPMENT</span>
                        </h5>
                    @elseif($showfos)
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR FOIL,</span>
                        </h5>
                    @elseif($showmaterial)
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR MATERIALS</span>
                    </h5>
                    @elseif($showViewModal)
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>PROGRAM OF WORK</span>
                    </h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <div class="control-group">
                    @if($showViewModal)
                    @foreach($programOfWorks as $programOfWork) 
                    <div class="col-xs-2 col-md-6 mb-6">
                 
                                <label >Name of Project : </label> 
                           
                        {{$programOfWork->name_of_project}}
                      
                     
                    </div>
                    <div class="col-xs-2 col-md-6 mb-6">
                                <label >Location : </label> {{$programOfWork->location}}
                    </div>
                    @endforeach
                    <div class="col-xs-2 col-md-2 mb-6">
                                <label >Project Cost : </label> ₱{{$detailSumEstimates}}
                    </div>
                    @else
                    <div class="row ">
                            <div class="col-xs-2 col-md-3 mb-6">
                                <label >Project </label>
                            </div>
                            <div class="col-xs-2 col-md-3 mb-6">
                                <label >Description </label>
                            </div>
                      
                    </div>    
                    </div>
                    <div class="control-group">
                        <div class="row ">
                            <div class="col-xs-2 col-md-3 mb-6">
                                <select wire:model="projectEstimateId" name="projectEstimateId" id="projectEstimateId"class="form-control  @error('projectIdEstimateId') is-invalid @enderror"> 
                                <option>--Select Project--</option> 
                                  
                                @foreach ($programs as $program)
                                    <option value='{{$program->name_of_project}}'>{{$program->name_of_project}}</option>
                                @endforeach
                                </select>
                                @error('projectEstimateId')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                            </div> 
                               
                            <div class="col-xs-2 col-md-3 mb-6">
                                <select wire:model="descriptionEstimate" name="descriptionEstimate" id="descriptionEstimate"class="form-control  @error('descriptionEstimate') is-invalid @enderror"> 
                                <option>--Select description--</option> 
                                @foreach ($descriptionids as $descriptionid)
                                    <option value='{{$descriptionid->description}}'>{{$descriptionid->description}}</option>
                                @endforeach
                                </select>
                                @error('descriptionEstimate')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                            </div> 
                            
                            </div>
                    </div>
                    @endif
                 
                      <div class="card card-outline card-primary mt-4">
                        <div class="card-header">
                        @if($showlabor)
                          <h3 class="card-title">LABOR</h3>
                          @elseif($showequipment)
                          <h3 class="card-title">EQUIPMENT</h3>
                          @elseif($showfos)
                          <h3 class="card-title">FUEL,OIL AND SPAREPARTS</h3>
                          @elseif($showmaterial)
                          <h3 class="card-title">MATERIAL</h3>
                        @endif
                          <div class="card-tools">
                            <span class="badge badge-primary">Label</span>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                     
                        <div class="card-body">
                        <div class="control-group">
                        @if($showViewModal)
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th class="text-center">ITEM NO.</th>
                                <th class="text-center">DESCRIPTION</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">UNIT COST</th>
                                <th class="text-center">AMOUNT</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                     
                        @foreach($detailEstimates as $detailEstimat)
                            <tr> 
                               
                                
                                <td>{{$detailEstimat->item_Number}}</td>
                                <td>{{$detailEstimat->description}}</td>
                                <td>{{$detailEstimat->quantity}}</td>
                                <td>{{$detailEstimat->sub_total / $detailEstimat->quantity }} </td>
                                <td>₱{{$detailEstimat->sub_total}}</td>
                     
                            </tr>
                            @endforeach
                      
                            <tr> 
                               <th colspan="4" class="text-right">Total :</th>
                               <th>₱{{$detailSumEstimates}}</th>
                           </tr>
                  
                         
                          
                                
                        </tbody>
                    </table>
                    @else
                    @endif
                <!-- /.card-body -->
                          <div class="row">
                            @if($showlabor)
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >Description</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >No.</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>No. of days</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>Rate/Day</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>Amount</label>
                            </div>
                            @elseif($showequipment)
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >TYPE/DESCRIPTION</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >NO.</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>EQUIP DAYS</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>RENTAL/DAY</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>AMOUNT</label>
                            </div>
                            @elseif($showfos)
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >TYPE/DESCRIPTION</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >QUANTITY</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>UNIT</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>UNIT COST</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>AMOUNT</label>
                            </div>
                            @elseif($showmaterial)
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >KIND</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >QUANTITY</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>UNIT</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>UNIT COST</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>AMOUNT</label>
                            </div>
                            @elseif($showViewModal)

                            @endif
                    </div>
                    </div>
                        <div class="control-group">
                        <div class="row">
                    @if($showlabor)
                        <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="labor.descriptionLabor" name="descriptionLabor" class="form-control @error('descriptionLabor') is-invalid @enderror" step="0.01" placeholder="Enter description">
                            @error('descriptionLabor')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberLabor"  id="numberLabor" name="numberLabor" class="form-control @error('numberLabor') is-invalid @enderror" step="0.01"  placeholder="Enter number">
                            @error('numberLabor')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberOfDays"    id="numberOfDays" name="numberOfDays" class="form-control @error('numberOfDays') is-invalid @enderror"  step="0.01" placeholder="Enter no. of days">
                            @error('numberOfDays')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.rateDay" id="rateDay" name="rateDay" class="form-control @error('rateDay') is-invalid @enderror" step="0.01"  placeholder="Enter rate/day">
                            @error('rateDay')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <output  type="float" wire:model="invoiceDetail.amountLabor" id="amountLabor" name="amountLabor" class="form-control" step="0.01" readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addLabor" name="add"class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                        @elseif($showequipment)
                             <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="equipment.descriptionEquipment" name="descriptionEquipment" class="form-control @error('descriptionEquiptment') is-invalid @enderror" placeholder="Enter description">
                            @error('descriptionEquipment')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberEquipment"  id="numberEquipment" name="numberEquipment" class="form-control @error('numberLabor') is-invalid @enderror"  placeholder="Enter number">
                            @error('numberEquipment')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.equipDays"  id="equipDays" name="equipDays" class="form-control @error('equipDays') is-invalid @enderror"  placeholder="Enter Equip days">
                            @error('equipDays')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.rentalDay"   id="rentalDay" name="rentalDay" class="form-control @error('rentalDay') is-invalid @enderror"  placeholder="Enter rental/day">
                            @error('rentalDay')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.amountEquipment"  id="amountEquipment" name="amountEquipment" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addEquipment" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                        @elseif($showmaterial)
                        <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="material.kindMaterial"  name="kindMaterial" class="form-control @error('kindMaterial') is-invalid @enderror" placeholder="Enter Kind">
                            @error('kindMaterial')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.quantityMaterial"  id="quantityMaterial" name="quantityMaterial" class="form-control @error('quantityMaterial') is-invalid @enderror"  placeholder="Enter Quantity">
                            @error('quantityMaterial')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="material.unitMaterial"  id="unitMaterial" name="unitMaterial" class="form-control @error('unitMaterial') is-invalid @enderror"  placeholder="Enter unit">
                            @error('unitMaterial')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.unitCostMaterial"  id="unitCostMaterial" name="unitCostMaterial" class="form-control @error('unitCostMaterial') is-invalid @enderror"  placeholder="Enter Unit Cost">
                            @error('unitCostMaterial')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model.defer="invoiceDetail.amountMaterial"  id="amountMaterial" name="amountMateral" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addMaterials" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                    @elseif($showfos)
                    <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text"  wire:model.defer="fos.descriptionFos"  name="descriptionFos" class="form-control @error('descriptionFos') is-invalid @enderror" placeholder="Enter description">
                            @error('descriptionFos')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.quantityFos"  id="quantityFos" name="quantityFos" class="form-control @error('quantityFos') is-invalid @enderror"  placeholder="Enter Quantity">
                            @error('quantityFos')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="fos.unitFos"  id="unitFos" name="unitFos" class="form-control @error('unitFos') is-invalid @enderror"  placeholder="Enter Unit">
                            @error('unitFos')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.unitCostFos" id="unitCostFos" name="unitCostFos" class="form-control @error('unitCostFos') is-invalid @enderror"  placeholder="Enter Unit Cost">
                            @error('unitCostFos')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.amountFos" wire:model.defer="fos.amountFos" id="amountFos" name="amountFos" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addFos" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
              
                        @endif
                    </div>
                
                    </div>
               
                        
            
                        </div>
                        </div>
                      </div>
              
                    <div class="modal-footer mt-4">
                    @if($showViewModal)
                    <div class="float-right">
                          <button type="submit" wire:click.prevent="submit" name="submit" class="btn btn-primary" ><i class="fas fa-paper-plane mr-1"></i>
                        <span>submit</span>
                        </button>
                        </div>
                    @endif
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 

       </div> 
<!----------End Modal for adding -------->


<!----------Start Table for estimate page -------->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
            </div>
                <div class="d-flex justify-content-end">
                <div class="row">
                    <label class=" mr-1 text-secondary" >By detailed estimate page:  </label>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input  wire:model="search" type="text" name="table_search" class="form-control float-right fas fa-search input-group-sm" placeholder="Search">
                    </div>
                </div>
                </div>
        </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>location</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($ProgramNames->isnotEmpty()) 
                   
                        @foreach($ProgramNames as $ProgramName)
                            <tr>
                                <td wire:model.defer="work.name_of_project">{{$ProgramName->name_of_project}}</td>
                                <td wire:model.defer="work.location">{{$ProgramName->location}}</td>
                                <td><button wire:click.prevent="viewStatus({{$ProgramName}})" class="btn btn-primary"><i class="fas fa-folder"></i>View</button>        
                            </tr>
                            @endforeach
                        @else
                        <tr> 
                           <td colspan="4" class="text-center"><label class="text-danger">No record found!</label></td>
                        </tr> 
                        @endif
                        </tbody>
                    </table>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
           
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!----------End Table -------->


</div>
