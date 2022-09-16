<div>
   <!--- start user display -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                 Approved Project
                </h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Approved Project</li>

                </ol>
            </div>
        </div>
    </div>
</div>
<!---------- button fucntion for budget -------->
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">
    <button wire:click.prevent="ConsumeBudget" class="btn btn-success"><i class="fa fa-plus-circle mr-1"></i>
      Update Consume Budget
    </button>
    
</div>
</div>
<!--------- end update consume button ------->
<!----------Start Table -------->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
      
            </div>
                <div class="d-flex justify-content-end">
                <div class="row">
                    <label class=" mr-1 text-secondary" >By Budget Name:  </label>
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
                               
                                <th> Project Name</th>
                                <th> Budget Alloted</th>
                                <th> Budget consumed</th>
                                <th> Balanced</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($approve->where('status','approved')) 
                            @foreach($budgets as $budget)
                            <tr> 
                               
                                <td>{{$budget->project_name}}</td>
                                <td>{{$budget->budget_alloted}}</td>
                                <td>{{$budget->budget_consumed}}</td>
                                <td>{{$budget->balance}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr> 
                           <td colspan="8" class="text-center"><label class="text-danger">No record found!</label></td>
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
<!----------End Table-------->
<!----------Start Modal form for update consume -------->
<div class="modal fade"  id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <form autocomplete="off" wire:submit.prevent="updateConsume">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span>Updating Consume Budget </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">Republic of the Philippines</div>
                    <div class="text-center">Municipality of Gasan Marinduque</div>
                    <div class="text-center"><p>Marinduque</p></div>
                    <div class="text-center"><label><p>PROGRAM OF WORK</p></label></div>
                    <div class="row col-xs-2 col-md-12 mb-2 ">
               
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                  
                            <label >Name of Project :  </label>
                            <select wire:model="projectId" name="projectId"class="form-control  @error('projectId') is-invalid @enderror"> 
                                    <option>--Select Project--</option> 
                                    @foreach ($projects as $project)
                                        <option value='{{$project->name_of_project}}'>{{$project->name_of_project}}</option>
                                    @endforeach
                                    </select>
                                    @error('projectId')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                     
                        </div>
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                    
                            <label >Location: </label> 
                       
                            @foreach ($locations as $location)
                            <input  type="text" value="{{$location->location}}"class="form-control"  readonly>
                            @endforeach
                       
                    
                        </div>
                    </div>
               
                    <div class="row col-xs-2 col-md-12 mb-2 ">
                 
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Labor Consume</label>
                            <input   wire:model="consume.labor" type="number" name="labor" id="labor" class="form-control @error('labor') is-invalid @enderror" placeholder="Enter Amount">
                            @error('labor')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                       
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                        
                            <label>Materials Consume</label>
                            <input   wire:model="consume.material" type="number" name="material" id="material" class="form-control @error('material') is-invalid @enderror" placeholder="Enter Amount">
                            @error('material')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                            
                        </div>
                        </div>
                        <div class="row col-xs-2 col-md-12 mb-2 ">
                        <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Budget Alloted : </label> 
                            <input  type="number" wire:model="alloteds" value="{{$alloteds}}"class="form-control"  readonly>
                      
                        </div>
                        <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Total Consume:</label> 
                            <input  type="number" wire:model="consume.consumeBudget" id="consumeBudget" name="consumeBudget" class="form-control"  readonly>
                        </div>
                        <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Balcance :</label>
                            <input  type="number" wire:model="consume.balance"  id="balance" name="balance" class="form-control"  readonly> 
                        </div>
                        </div>
                    
                        <div class="modal-footer">
                       
                            <button type="submit" name="updateConsume" class="btn btn-success" value="updateConsume"><i class="fas fa-paper-plane mr-1"></i>
                            <span>Update</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!----------End Modal form for update consume -------->



</div>
