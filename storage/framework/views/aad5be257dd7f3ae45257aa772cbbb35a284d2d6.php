<div>

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-2">

    <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Select Name Of Project</label>
                            <select wire:model="projectId"  id="projectId" name="projectId" class="form-control">
                            <option value="">--Select Project --</option> 
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->name_of_project); ?>"><?php echo e($project->name_of_project); ?></option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php if($projectIds == 1): ?>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3 class="card-title">Barangay: <?php echo e($location->location); ?></h3>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <h3 class="card-title">Barangay: </h3>
            <?php endif; ?>
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
                        <?php if($projectIds == 1): ?>
                        <?php $__currentLoopData = $detailEstimates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailEstimat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                               
                                
                                <td><?php echo e($detailEstimat->item_Number); ?></td>
                                <td><?php echo e($detailEstimat->description); ?></td>
                                <td><?php echo e($detailEstimat->quantity); ?></td>
                                <td><?php echo e($detailEstimat->sub_total / $detailEstimat->quantity); ?> </td>
                                <td>₱<?php echo e($detailEstimat->sub_total); ?></td>
                                
                     
                            </tr>
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                      
                            <tr> 
                               <th colspan="4" class="text-right">Total :</th>
                               <th>₱<?php echo e($detailSumEstimates); ?></th>
                           </tr>
                        <?php else: ?>
                        <tr> 
                           <td colspan="6" class="text-center"><label class="text-danger">No record found!</label></td>
                        </tr> 
                        <?php endif; ?>
                         
                          
                                
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
              <?php if($projectIds == 1): ?>
            <div class="chart" >
            <canvas id="barCharts" style="min-height: 150px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
            </div>
            <?php else: ?>
            <div class="chart" >
            <canvas id="barChart" style="min-height: 150px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
            </div>
            <?php endif; ?>
            </div>
            </div>
    </div>
    <div class="column">
        <div class="row">
            
        <div class="col-md-6 col-6" style="min-height: 60px; height: 75px; max-height: 75px; max-width: 100%;">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              
                <?php if($projectIds == 1): ?>
                <h3><?php echo e($allottedBudget); ?></h3>
              <?php else: ?>
             
              <h3>0</h3>
              <?php endif; ?>
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
              <?php if($projectIds == 1): ?>
                <h3><?php echo e($balanceBudget); ?></h3>
              <?php else: ?>
              <h3>0</h3>
              <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\bums\resources\views/livewire/admin/admin-project.blade.php ENDPATH**/ ?>