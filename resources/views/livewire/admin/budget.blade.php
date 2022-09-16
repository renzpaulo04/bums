<div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                 Budget
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>

                    <li class="breadcrumb-item active">Budget</li>
                </ol>
            </div>
        </div>
    </div>
</div>

   <!---------- button fucntion for budget -------->
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">
    <div>
    <button wire:click.prevent="addNewBudget" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>
       Add New Budget
    </button>
 </div>
    </div>
</div>
<!--------- end add new budget button ------->
<!----------Start Table for project reqeusting -------->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
      
            </div>
                <div class="d-flex justify-content-end">
                <div class="row">
                    <label class=" mr-1 text-secondary" >Project Reqeusting:  </label>
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
                                <th>User Name</th>
                                <th>Name of Project</th>
                                <th>Location</th>
                           
                                <th>Program of Work</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($projects->isnotEmpty()) 
                            @foreach($projects as $project)
                            <tr> 
                               <td>{{$project->user_name}}</td>
                                <td>{{$project->name_of_project}}</td>
                                <td>{{$project->location}}</td>
                         
                                <td><button wire:click.prevent="viewProject({{$project}})" class="btn btn-primary"><i class="fas fa-folder"></i>View</button>
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
<!----------End Table for Room -------->

<!----------Start Modal form for adding budget -------->



<div class="modal fade"  id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>

@if($showDetailModal)
        <div class="modal-dialog modal-xl" role="document">
        @else
        <div class="modal-dialog modal-lg" role="document">
        @endif
            <form autocomplete="off" wire:submit.prevent="createBudget">
            <div class="modal-content">
                @if($showDetailModal)
                <div class="modal-header bg-gradient-warning">
                    <h5 class="modal-title" id="exampleModalLabel">
          
                        @foreach($nameContractors as $nameContractor)
                        <span>{{$nameContractor->firstName}} {{$nameContractor->lastName}} </span>
                        @endforeach
                   
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>Add New Budget</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="modal-body">
                @if($showDetailModal)
                <div class="text-center">Republic of the Philippines</div>
                <div class="text-center">Municipality of Gasan Marinduque</div>
                <div class="text-center"><p>Marinduque</p></div>

                <div class="text-center"><label><p>PROGRAM OF WORK</p></label></div>
               
                <div class="col-xs-2 col-md-10 mb-6">
                    @foreach($projectdetails as $projectdetail)
                    <label >Name of Project :  </label> {{$projectdetail->name_of_project}}
                </div>
                
     <div class="col-xs-2 col-md-6 mb-6">
                 <label >Location : </label> {{$projectdetail->location}}
     </div>
     @endforeach
     <div class="control-group">
     <table class="table table-bordered table-striped">
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
                        @foreach($detailed as $detaileds)
                            <tr> 
  
                                <td>{{$detaileds->item_Number}}</td>
                                <td>{{$detaileds->description}}</td>
                                <td>{{$detaileds->quantity}}</td>
                                <td>{{$detaileds->sub_total / $detaileds->quantity }} </td>
                                <td>₱{{$detaileds->sub_total}}</td>
                            </tr>
                            @endforeach
                            <tr> 
                               <th colspan="4" class="text-right">Total :</th>
                               <th>₱{{$detailedSum}}</th>
                           </tr> 
                        </tbody>
                    </table>
                    </div>
                    <div class="control-group">
                        <label>TOTAL COST OF PROJECT: ₱{{$detailedSum}}</label>
                    </div>
                @else
                <div class="row">
                <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Project Name</label>
                            <select wire:model="projectId" wire:model.defer="budget.projectId" id="projectId" name="projectId" class="form-control @error('projectName') is-invalid @enderror">
                            <option>--Select Project --</option> 
                            @foreach($projectBudget as $projectBudgets)
                                    <option value="{{$projectBudgets->name_of_project}}">{{$projectBudgets->name_of_project}}</option> 
                                    @endforeach
                                </select>
                            @error('projectId')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Budget Alloted</label>
                            <input   wire:model.defer="budget.number_of_budget" type="number" name="number_of_budget" class="form-control @error('number_of_budget') is-invalid @enderror" placeholder="Enter budget">
                            @error('name_of_budget')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                            
                        </div>     
                        </div>
                        <div class="row">

                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Project Cost :  ₱{{$detailsums}}</label> 
                          
                        </div>    
                        </div>
                   
                        @endif
                    <div class="modal-footer">
                    @if($showDetailModal) 

                    @else
                  
                        <button type="submit" name="approved" class="btn btn-success" value="approved"><i class="fas fa-paper-plane mr-1"></i>
                        <span>Approved</span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<!----------End Modal form for adding budget -------->


</div>
