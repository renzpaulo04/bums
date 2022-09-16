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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>

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
                        <?php if($projects->isnotEmpty()): ?> 
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                               <td><?php echo e($project->user_name); ?></td>
                                <td><?php echo e($project->name_of_project); ?></td>
                                <td><?php echo e($project->location); ?></td>
                         
                                <td><button wire:click.prevent="viewProject(<?php echo e($project); ?>)" class="btn btn-primary"><i class="fas fa-folder"></i>View</button>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr> 
                           <td colspan="4" class="text-center"><label class="text-danger">No record found!</label></td>
                        </tr> 
                                <?php endif; ?> 
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

<?php if($showDetailModal): ?>
        <div class="modal-dialog modal-xl" role="document">
        <?php else: ?>
        <div class="modal-dialog modal-lg" role="document">
        <?php endif; ?>
            <form autocomplete="off" wire:submit.prevent="createBudget">
            <div class="modal-content">
                <?php if($showDetailModal): ?>
                <div class="modal-header bg-gradient-warning">
                    <h5 class="modal-title" id="exampleModalLabel">
          
                        <?php $__currentLoopData = $nameContractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nameContractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><?php echo e($nameContractor->firstName); ?> <?php echo e($nameContractor->lastName); ?> </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php else: ?>
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>Add New Budget</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <div class="modal-body">
                <?php if($showDetailModal): ?>
                <div class="text-center">Republic of the Philippines</div>
                <div class="text-center">Municipality of Gasan Marinduque</div>
                <div class="text-center"><p>Marinduque</p></div>

                <div class="text-center"><label><p>PROGRAM OF WORK</p></label></div>
               
                <div class="col-xs-2 col-md-10 mb-6">
                    <?php $__currentLoopData = $projectdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label >Name of Project :  </label> <?php echo e($projectdetail->name_of_project); ?>

                </div>
                
     <div class="col-xs-2 col-md-6 mb-6">
                 <label >Location : </label> <?php echo e($projectdetail->location); ?>

     </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $__currentLoopData = $detailed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detaileds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
  
                                <td><?php echo e($detaileds->item_Number); ?></td>
                                <td><?php echo e($detaileds->description); ?></td>
                                <td><?php echo e($detaileds->quantity); ?></td>
                                <td><?php echo e($detaileds->sub_total / $detaileds->quantity); ?> </td>
                                <td>₱<?php echo e($detaileds->sub_total); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                               <th colspan="4" class="text-right">Total :</th>
                               <th>₱<?php echo e($detailedSum); ?></th>
                           </tr> 
                        </tbody>
                    </table>
                    </div>
                    <div class="control-group">
                        <label>TOTAL COST OF PROJECT: ₱<?php echo e($detailedSum); ?></label>
                    </div>
                <?php else: ?>
                <div class="row">
                <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Project Name</label>
                            <select wire:model="projectId" wire:model.defer="budget.projectId" id="projectId" name="projectId" class="form-control <?php $__errorArgs = ['projectName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option>--Select Project --</option> 
                            <?php $__currentLoopData = $projectBudget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectBudgets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($projectBudgets->name_of_project); ?>"><?php echo e($projectBudgets->name_of_project); ?></option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php $__errorArgs = ['projectId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                   <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Budget Alloted</label>
                            <input   wire:model.defer="budget.number_of_budget" type="number" name="number_of_budget" class="form-control <?php $__errorArgs = ['number_of_budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter budget">
                            <?php $__errorArgs = ['name_of_budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                   <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                        </div>     
                        </div>
                        <div class="row">

                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Project Cost :  ₱<?php echo e($detailsums); ?></label> 
                          
                        </div>    
                        </div>
                   
                        <?php endif; ?>
                    <div class="modal-footer">
                    <?php if($showDetailModal): ?> 

                    <?php else: ?>
                  
                        <button type="submit" name="approved" class="btn btn-success" value="approved"><i class="fas fa-paper-plane mr-1"></i>
                        <span>Approved</span>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<!----------End Modal form for adding budget -------->


</div>
<?php /**PATH C:\xampp\htdocs\bums\resources\views/livewire/admin/budget.blade.php ENDPATH**/ ?>