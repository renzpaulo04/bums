<div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                 Master List
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
          

                    <li class="breadcrumb-item active">Master List</li>
                </ol>
            </div>
        </div>
    </div>
</div>


    <!---------- button fucntion for detail estimates -------->

<div class="container-fluid">

 
    <form wire:submit.prevent="createDetailedEstimatesPage" >
    <div class="card card-outline card-warning mt-4 ">
                        <div class="card-header">
                          <h3 class="card-title">Create First Detailed Estimates Page</h3>
                          <div class="card-tools">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="badge badge-primary">Label</span>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="control-group">
                          <div class="row">
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >PROJECT NAME:</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label >ITEM NO.</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>DESCRIPTION</label>
                            </div>
                            <div class="col-xs-2 col-md-2 mb-6">
                                <label>QUANTITY</label>
                            </div>
                          
                    </div>
                    </div>
                        <div class="control-group">
                        <div class="row">
                        <div class="col-xs-2 col-md-2 mb-6">
                                <select wire:model.defer="state.projectId" name="projectId"class="form-control  @error('projectId') is-invalid @enderror"> 
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="state.itemNumber" id="itemNumber" name="itemNumber" class="form-control @error('itemNumber') is-invalid @enderror"  placeholder="Enter Item Number">
                            @error('itemNumber')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="state.description" id="description" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Enter Description">
                            @error('description')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="state.quantity" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"  placeholder="quantity">
                            @error('quantity')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                                <select wire:model.defer="state.unitId" name="unitId"class="form-control  @error('unitId') is-invalid @enderror"> 
                                <option>--Select Unit--</option> 
                             
                                    <option value='cu.m'>cu.m</option>
                                    <option value='post'>post</option>
                                    <option value='l.m'>l.m</option>
                                    <option value='s.m'>s.m</option>
                                </select>
                                @error('unitId')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                            </div>                 
                    </div>
                    </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" >
                        <div class="float-right">
                          <button type="submit" name="addLabor" class="btn btn-primary" value="addDetailedEstimatePage"><i class="fa fa-save mr-1"></i>
                        <span>Save</span>
                        </button>
                          </div>
                        </div>
                        <!-- /.card-footer -->
                      </div>
                      <!-- /.card -->
                      </form>

                      </div>
</div>
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
              
                <div class="card-body table-responsive p-0" style="height: 100px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>item no.</th>
                                <th>description</th>
                                <th>quantity</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                     
                        <tbody>
                        @if($detailEstimatePages->isnotEmpty()) 
                        @foreach($detailEstimatePages as $detailEstimatePage)
                            <tr> 
                                <td>{{$detailEstimatePage->project_Id}}</td>
                                <td>{{$detailEstimatePage->item_Number}}</td>
                                <td>{{$detailEstimatePage->description}}</td>
                                <td>{{$detailEstimatePage->quantity}}</td>
                                <td>₱{{$detailEstimatePage->sub_total}}</td>
                            </tr>
                            @endforeach
                      
                      
                            @else
                            <tr> 
                           <td colspan="6" class="text-center"><label class="text-danger">No record found!</label></td>
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
