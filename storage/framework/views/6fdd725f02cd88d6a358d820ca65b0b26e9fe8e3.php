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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>
          

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
                    <?php if($showlabor): ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR LABOR</span>
                        </h5>
                    <?php elseif($showequipment): ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR EQUIPMENT</span>
                        </h5>
                    <?php elseif($showfos): ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR FOIL,</span>
                        </h5>
                    <?php elseif($showmaterial): ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>DETAILED ESTIMATES FOR MATERIALS</span>
                    </h5>
                    <?php elseif($showViewModal): ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span>PROGRAM OF WORK</span>
                    </h5>
                    <?php endif; ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <div class="control-group">
                    <?php if($showViewModal): ?>
                    <?php $__currentLoopData = $programOfWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programOfWork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="col-xs-2 col-md-6 mb-6">
                 
                                <label >Name of Project : </label> 
                           
                        <?php echo e($programOfWork->name_of_project); ?>

                      
                     
                    </div>
                    <div class="col-xs-2 col-md-6 mb-6">
                                <label >Location : </label> <?php echo e($programOfWork->location); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-2 col-md-2 mb-6">
                                <label >Project Cost : </label> ₱<?php echo e($detailSumEstimates); ?>

                    </div>
                    <?php else: ?>
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
                                <select wire:model="projectEstimateId" name="projectEstimateId" id="projectEstimateId"class="form-control  <?php $__errorArgs = ['projectIdEstimateId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                                <option>--Select Project--</option> 
                                  
                                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($program->name_of_project); ?>'><?php echo e($program->name_of_project); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['projectEstimateId'];
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
                               
                            <div class="col-xs-2 col-md-3 mb-6">
                                <select wire:model="descriptionEstimate" name="descriptionEstimate" id="descriptionEstimate"class="form-control  <?php $__errorArgs = ['descriptionEstimate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                                <option>--Select description--</option> 
                                <?php $__currentLoopData = $descriptionids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descriptionid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($descriptionid->description); ?>'><?php echo e($descriptionid->description); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['descriptionEstimate'];
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
                    </div>
                    <?php endif; ?>
                 
                      <div class="card card-outline card-primary mt-4">
                        <div class="card-header">
                        <?php if($showlabor): ?>
                          <h3 class="card-title">LABOR</h3>
                          <?php elseif($showequipment): ?>
                          <h3 class="card-title">EQUIPMENT</h3>
                          <?php elseif($showfos): ?>
                          <h3 class="card-title">FUEL,OIL AND SPAREPARTS</h3>
                          <?php elseif($showmaterial): ?>
                          <h3 class="card-title">MATERIAL</h3>
                        <?php endif; ?>
                          <div class="card-tools">
                            <span class="badge badge-primary">Label</span>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                     
                        <div class="card-body">
                        <div class="control-group">
                        <?php if($showViewModal): ?>
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
                  
                         
                          
                                
                        </tbody>
                    </table>
                    <?php else: ?>
                    <?php endif; ?>
                <!-- /.card-body -->
                          <div class="row">
                            <?php if($showlabor): ?>
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
                            <?php elseif($showequipment): ?>
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
                            <?php elseif($showfos): ?>
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
                            <?php elseif($showmaterial): ?>
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
                            <?php elseif($showViewModal): ?>

                            <?php endif; ?>
                    </div>
                    </div>
                        <div class="control-group">
                        <div class="row">
                    <?php if($showlabor): ?>
                        <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="labor.descriptionLabor" name="descriptionLabor" class="form-control <?php $__errorArgs = ['descriptionLabor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" step="0.01" placeholder="Enter description">
                            <?php $__errorArgs = ['descriptionLabor'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberLabor"  id="numberLabor" name="numberLabor" class="form-control <?php $__errorArgs = ['numberLabor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" step="0.01"  placeholder="Enter number">
                            <?php $__errorArgs = ['numberLabor'];
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

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberOfDays"    id="numberOfDays" name="numberOfDays" class="form-control <?php $__errorArgs = ['numberOfDays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  step="0.01" placeholder="Enter no. of days">
                            <?php $__errorArgs = ['numberOfDays'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.rateDay" id="rateDay" name="rateDay" class="form-control <?php $__errorArgs = ['rateDay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" step="0.01"  placeholder="Enter rate/day">
                            <?php $__errorArgs = ['rateDay'];
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
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <output  type="float" wire:model="invoiceDetail.amountLabor" id="amountLabor" name="amountLabor" class="form-control" step="0.01" readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addLabor" name="add"class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                        <?php elseif($showequipment): ?>
                             <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="equipment.descriptionEquipment" name="descriptionEquipment" class="form-control <?php $__errorArgs = ['descriptionEquiptment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter description">
                            <?php $__errorArgs = ['descriptionEquipment'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.numberEquipment"  id="numberEquipment" name="numberEquipment" class="form-control <?php $__errorArgs = ['numberLabor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter number">
                            <?php $__errorArgs = ['numberEquipment'];
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

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.equipDays"  id="equipDays" name="equipDays" class="form-control <?php $__errorArgs = ['equipDays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Equip days">
                            <?php $__errorArgs = ['equipDays'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.rentalDay"   id="rentalDay" name="rentalDay" class="form-control <?php $__errorArgs = ['rentalDay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter rental/day">
                            <?php $__errorArgs = ['rentalDay'];
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
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.amountEquipment"  id="amountEquipment" name="amountEquipment" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addEquipment" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                        <?php elseif($showmaterial): ?>
                        <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text" wire:model.defer="material.kindMaterial"  name="kindMaterial" class="form-control <?php $__errorArgs = ['kindMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Kind">
                            <?php $__errorArgs = ['kindMaterial'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.quantityMaterial"  id="quantityMaterial" name="quantityMaterial" class="form-control <?php $__errorArgs = ['quantityMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Quantity">
                            <?php $__errorArgs = ['quantityMaterial'];
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

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="material.unitMaterial"  id="unitMaterial" name="unitMaterial" class="form-control <?php $__errorArgs = ['unitMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter unit">
                            <?php $__errorArgs = ['unitMaterial'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.unitCostMaterial"  id="unitCostMaterial" name="unitCostMaterial" class="form-control <?php $__errorArgs = ['unitCostMaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Unit Cost">
                            <?php $__errorArgs = ['unitCostMaterial'];
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
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model.defer="invoiceDetail.amountMaterial"  id="amountMaterial" name="amountMateral" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addMaterials" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
                    <?php elseif($showfos): ?>
                    <div class="col-xs-2 col-md-2 mb-6">
   
                            <input  type="text"  wire:model.defer="fos.descriptionFos"  name="descriptionFos" class="form-control <?php $__errorArgs = ['descriptionFos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter description">
                            <?php $__errorArgs = ['descriptionFos'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.quantityFos"  id="quantityFos" name="quantityFos" class="form-control <?php $__errorArgs = ['quantityFos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Quantity">
                            <?php $__errorArgs = ['quantityFos'];
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

                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="text" wire:model.defer="fos.unitFos"  id="unitFos" name="unitFos" class="form-control <?php $__errorArgs = ['unitFos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Unit">
                            <?php $__errorArgs = ['unitFos'];
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
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.unitCostFos" id="unitCostFos" name="unitCostFos" class="form-control <?php $__errorArgs = ['unitCostFos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Enter Unit Cost">
                            <?php $__errorArgs = ['unitCostFos'];
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
                    
                        <div class="col-xs-2 col-md-2 mb-6">
                            <input  type="number" wire:model="invoiceDetail.amountFos" wire:model.defer="fos.amountFos" id="amountFos" name="amountFos" class="form-control"  readonly>
                        </div>
                        <div class="col-xs-2 col-md-2 mb-6">
                        <button wire:click.prevent="addFos" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i></button>
                        </div>
              
                        <?php endif; ?>
                    </div>
                
                    </div>
               
                        
            
                        </div>
                        </div>
                      </div>
              
                    <div class="modal-footer mt-4">
                    <?php if($showViewModal): ?>
                    <div class="float-right">
                          <button type="submit" wire:click.prevent="submit" name="submit" class="btn btn-primary" ><i class="fas fa-paper-plane mr-1"></i>
                        <span>submit</span>
                        </button>
                        </div>
                    <?php endif; ?>
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
                        <?php if($ProgramNames->isnotEmpty()): ?> 
                   
                        <?php $__currentLoopData = $ProgramNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ProgramName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td wire:model.defer="work.name_of_project"><?php echo e($ProgramName->name_of_project); ?></td>
                                <td wire:model.defer="work.location"><?php echo e($ProgramName->location); ?></td>
                                <td><button wire:click.prevent="viewStatus(<?php echo e($ProgramName); ?>)" class="btn btn-primary"><i class="fas fa-folder"></i>View</button>        
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
<!-- /.container-fluid -->
<!----------End Table -------->


</div>
<?php /**PATH C:\xampp\htdocs\bums\resources\views/livewire/user/program-work.blade.php ENDPATH**/ ?>