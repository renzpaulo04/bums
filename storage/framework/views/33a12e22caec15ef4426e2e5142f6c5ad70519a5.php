
<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
               <?php if( Auth::user()->role == 'IISTFACULTY'): ?>
                            <a href="<?php echo e(route('faculty.dashboard')); ?>" class="nav-link <?php echo e((request()->is('faculty/dashboard')) ? 'active': ''); ?>">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                <?php elseif( Auth::user()->role == 'STUDENT'): ?>
                            <a href="<?php echo e(route('student.dashboard')); ?>" class="nav-link <?php echo e((request()->is('student/student-dashboard')) ? 'active': ''); ?>">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                <?php elseif( Auth::user()->role == 'OTHERFACULTY'): ?>
                            <a href="<?php echo e(route('guest.dashboard')); ?>" class="nav-link <?php echo e((request()->is('guest/guest-dashboard')) ? 'active': ''); ?>">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                <?php endif; ?>
                </li>
                <?php if( Auth::user()->role == 'IISTFACULTY'): ?>
                <li class="nav-item">
                            <a href="<?php echo e(route('faculty.schedule')); ?>" class="nav-link <?php echo e((request()->is('faculty/faculty-schedule-view')) ? 'active': ''); ?>">
                            <i class="fas fa-clipboard-list"></i>
                                <p> View Schedule</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('faculty.profile')); ?>" class="nav-link <?php echo e((request()->is('faculty/faculty-profile')) ? 'active': ''); ?>">
                            <i class="fas fa-id-card"></i>
                                <p> Profile</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="<?php echo e(route('faculty.attendance')); ?>" class="nav-link <?php echo e((request()->is('faculty/faculty-attendance')) ? 'active': ''); ?>">
                            <i class="fas fa-chalkboard-teacher"></i>
                                <p>Attendance</p>
                            </a>
                </li>
                <?php elseif( Auth::user()->role == 'STUDENT'): ?>
                <li class="nav-item">
                            <a href="<?php echo e(route('student.schedule')); ?>" class="nav-link <?php echo e((request()->is('student/student-schedule-v-iew')) ? 'active': ''); ?>">
                            <i class="fas fa-clipboard-list"></i>
                                <p> View Schedule</p>
                            </a>
                            </li>
                    <li class="nav-item">
                            <a href="<?php echo e(route('student.profile')); ?>" class="nav-link <?php echo e((request()->is('student/student-profile')) ? 'active': ''); ?>">
                            <i class="fas fa-id-card"></i>
                                <p> Profile</p>
                            </a>
                </li>

                <?php elseif( Auth::user()->role == 'OTHERFACULTY'): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('guest.profile')); ?>" class="nav-link <?php echo e((request()->is('guest/list-generates'))  ? 'active' : ''); ?>">
                                <i class="fas fa-id-card"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                        <?php endif; ?>
<?php /**PATH C:\xampp\htdocs\asms\resources\views/layouts/menu.blade.php ENDPATH**/ ?>