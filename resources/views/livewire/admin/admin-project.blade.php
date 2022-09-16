<div>

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">

    <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Select Name Of Project</label>
                            <select wire:model="projectId"  id="projectId" name="projectId" class="form-control">
                            <option value="">--Select Project --</option> 
                            @foreach($projects as $project)
                                    <option value="{{$project->name_of_project}}">{{$project->name_of_project}}</option> 
                                    @endforeach
                                </select>
                        </div>
    </div>
</div>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-6" >
            <div class="card card-success">
            <div class="card-header">
            @if($projectIds == 1)
            @foreach($locations as $location)
            <h3 class="card-title">Barangay: {{$location->location}}</h3>
            @endforeach
            @else
            <h3 class="card-title">Barangay: </h3>
            @endif
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
            </div>
            </div>
           
            <div class="card-body" >
            <div class="chart" style="min-height: 250px; height: 340px; max-height: 340px; max-width: 100%;">
            <div class="card-body table-responsive p-0" style="height: 300px;">
            <div class="text-center">Republic of the Philippines</div>
                <div class="text-center">Municipality of Gasan Marinduque</div>
                <div class="text-center"><p>Marinduque</p></div>
                
                <div class="text-center"><label><p>PROGRAM OF WORK</p></label></div>
            
                <table id="example2" class="table table-sm">
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
                        @if($projectIds == 1)
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
                        @else
                        <tr> 
                           <td colspan="6" class="text-center"><label class="text-danger">No record found!</label></td>
                        </tr> 
                        @endif
                         
                          
                                
                        </tbody>
                    </table>
                    </div>
            </div>
            </div>
            </div>
            
</div>           
<div class="col-md-6">

    <div class="column">
            <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Stacked Bar Chart</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
            </div>
            </div>
            <div class="card-body">
              @if($projectIds == 1)
            <div class="chart" >
            <canvas id="barCharts" style="min-height: 150px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
            </div>
            @else
            <div class="chart" >
            <canvas id="barChart" style="min-height: 150px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
            </div>
            @endif
            </div>
            </div>
    </div>
    <div class="column">
        <div class="row">
            
        <div class="col-md-6 col-6" style="min-height: 60px; height: 75px; max-height: 75px; max-width: 100%;">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              
                @if($projectIds == 1)
                <h3>{{$allottedBudget}}</h3>
              @else
             
              <h3>0</h3>
              @endif
                <p>BUDGET ALLOTED</p>
              </div>
              
              <div class="icon">
                <i class="fas fa-check"></i>
               
              </div>
            </div>
          </div>

          <div class="col-md-6 col-6" style="min-height: 60px; height: 75px; max-height: 75px; max-width: 100%;">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              @if($projectIds == 1)
                <h3>{{$balanceBudget}}</h3>
              @else
              <h3>0</h3>
              @endif
                <p>BALANCE</p>
              </div>
              
              <div class="icon">
                <i class="fas fa-check"></i>
               
              </div>
            </div>
          </div>
          </div>
    </div>
          <!-- ./col -->
</div>          
</div>
</div>

</section>
</div>
