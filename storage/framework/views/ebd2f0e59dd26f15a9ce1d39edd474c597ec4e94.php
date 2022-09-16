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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>
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
                        <?php if($approve->where('status','approved')): ?> 
                            <?php $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                               
                                <td><?php echo e($budget->project_name); ?></td>
                                <td><?php echo e($budget->budget_alloted); ?></td>
                                <td><?php echo e($budget->budget_consumed); ?></td>
                                <td><?php echo e($budget->balance); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr> 
                           <td colspan="8" class="text-center"><label class="text-danger">No record found!</label></td>
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
                            <select wire:model="projectId" name="projectId"class="form-control  <?php $__errorArgs = ['projectId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                                    <option>--Select Project--</option> 
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value='<?php echo e($project->name_of_project); ?>'><?php echo e($project->name_of_project); ?></option>
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
                    
                            <label >Location: </label> 
                       
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input  type="text" value="<?php echo e($location->location); ?>"class="form-control"  readonly>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    
                        </div>
                    </div>
               
                    <div class="row col-xs-2 col-md-12 mb-2 ">
                 
                        <div class="control-group col-xs-2 col-md-6 mb-2">
                            <label>Labor Consume</label>
                            <input   wire:model="consume.labor" type="number" name="labor" id="labor" class="form-control <?php $__errorArgs = ['labor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Amount">
                            <?php $__errorArgs = ['labor'];
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
                        
                            <label>Materials Consume</label>
                            <input   wire:model="consume.material" type="number" name="material" id="material" class="form-control <?php $__errorArgs = ['material'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Amount">
                            <?php $__errorArgs = ['material'];
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
                        <div class="row col-xs-2 col-md-12 mb-2 ">
                        <div class="control-group col-xs-2 col-md-4 mb-2">
                            <label>Budget Alloted : </label> 
                            <input  type="number" wire:model="alloteds" value="<?php echo e($alloteds); ?>"class="form-control"  readonly>
                      
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
<?php /**PATH C:\xampp\htdocs\bums\resources\views/livewire/user/approved-project.blade.php ENDPATH**/ ?>