<div>
<!--- start project display -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                 Project
                </h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>

                </ol>

            </div>
        </div>
    </div>
</div>
<!--- end Project displat ---->

<!---------- button fucntion for Room -------->
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">
    <div>
    <button wire:click.prevent="addNewProject" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>
       Add New Project
    </button>
 </div>
    </div>
</div>
<!--------- end add new project button ------->

<!----------Start Modal form for adding project -------->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form autocomplete="off" wire:submit.prevent="createProject">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>Add New Project</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="control-group">
                            <label>Name of Project</label>
                            <input  type="text" wire:model.defer="state.name_of_project" name="name_of_project" class="form-control @error('name_of_project') is-invalid @enderror" placeholder="Enter name of project">
                            @error('name_of_project')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                            
                        </div>
                        <div class="control-group">
                            <label>location</label>
                            <select wire:model.defer="state.location" name="location" class="form-control @error('location') is-invalid @enderror">
                            <option>--Select Barangay --</option> 
                                    <option value="Antipolo">Antipolo</option> 
                                    <option value="Bachao Ibaba">Bachao Ibaba</option>
                                    <option value="Bachao Ilaya">Bachao Ilaya</option>  
                                    <option value="Bacongbacong">Bacongbacong</option>   
                                    <option value="Bahi">Bahi</option>
                                    <option value="Bangbang">Bangbang</option>
                                    <option value="Banot">Banot</option>
                                    <option value="Banuyo">Banuyo</option>
                                    <option value="barangay I">Barangay I</option>
                                    <option value="barangay II">Barangay II</option>
                                    <option value="barangay III">barangay III</option>
                                    <option value="Bognuyan">Bognuyan</option>
                                    <option value="Cabugao">Cabugao</option>
                                    <option value="Dawis">Dawis</option>
                                    <option value="Dili">Dili</option>
                                    <option value="Libtangin">Libtangin</option>
                                    <option value="Mahunig">Mahunig</option>
                                    <option value="Mangiliol">Mangiliol</option>
                                    <option value="Masiga">Masiga</option>
                                    <option value="Matandang Gasan">Matandang Gasan</option>
                                    <option value="Pangi">Pangi</option>
                                    <option value="Pingan">Pingan</option>
                                    <option value="Tabionan">Tabionan</option>
                                    <option value="Tapuyan">Tapuyan</option>
                                    <option value="Tiguion">Tiguion</option>

                                </select>
                            @error('location')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>      
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> cancel</button>
                        <button type="submit" name="addProject" class="btn btn-primary" value="addProject"><i class="fa fa-save mr-1"></i>
                        <span>Save</span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<!----------End Modal form for adding Project -------->

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
                    <label class=" mr-1 text-secondary" >By Project Name:  </label>
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
                                <th> Location</th>
                                <th> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($projects->isnotEmpty()) 
                            @foreach($projects as $project)
                            <tr> 
                               
                                <td>{{$project->name_of_project}}</td>
                                <td>{{$project->location}}</td>
                                <td>{{$project->status}}</td>
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

</div>
