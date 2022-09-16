
<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <img src="<?php echo e(URL::to('public/img/gasanbuilding.jpg')); ?>" style="width: 230px; height: 150px"  alt="description of image">
            
                 <li class="nav-item">
               <?php if( Auth::user()->role == 'USER'): ?>
                            <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link <?php echo e((request()->is('user/dashboard')) ? 'active': ''); ?>">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                <?php elseif( Auth::user()->role == 'ADMIN'): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e((request()->is('admin/admin-dashboard')) ? 'active': ''); ?>">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="<?php echo e(route('admin.project')); ?>" class="nav-link <?php echo e((request()->is('admin/admin-project')) ? 'active': ''); ?>">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Project</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('admin.budget')); ?>" class="nav-link <?php echo e((request()->is('admin/budget')) ? 'active': ''); ?>">
                            <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Budget</p>
                            </a>
                </li>
                <?php endif; ?>
                </li>
                <?php if( Auth::user()->role == 'USER'): ?>
                <li class="nav-item">
                            <a href="<?php echo e(route('user.project')); ?>" class="nav-link <?php echo e((request()->is('user/project')) ? 'active': ''); ?>">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Project</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('user.masterList')); ?>" class="nav-link <?php echo e((request()->is('user/masterList')) ? 'active': ''); ?>">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Master List</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('user.programWork')); ?>" class="nav-link <?php echo e((request()->is('user/program-work')) ? 'active': ''); ?>">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Program Work</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('user.approvedproject')); ?>" class="nav-link <?php echo e((request()->is('user/approved-project')) ? 'active': ''); ?>">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Approved Project</p>
                            </a>
                </li>

                        <?php endif; ?>


<?php /**PATH C:\xampp\htdocs\bums\resources\views/layouts/menu.blade.php ENDPATH**/ ?>