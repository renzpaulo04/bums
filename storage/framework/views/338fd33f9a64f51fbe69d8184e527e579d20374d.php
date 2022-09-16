

            <!-- Right navbar links -->
            <li class="nav-item dropdown user-menu">

                <a href="#profile" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img   src="<?php echo e(asset('/img/avatar4.png')); ?>"
                         class="user-image img-circle elevation-2" alt="User Image">

                    <span class="d-none d-md-inline"><?php echo e(Auth::user()->firstName); ?></span>

                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="profile">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img  src="<?php echo e(asset('/img/avatar4.png')); ?>"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                        <?php if(Auth::user()->role == 'ADMIN'): ?>
                        <?php echo e(Auth::user()->firstName); ?>

                        <?php else: ?>
                        <?php echo e(Auth::user()->lastName); ?> , <?php echo e(Auth::user()->firstName); ?>

                            <small>Member since <?php echo e(Auth::user()->created_at->format('M. Y')); ?></small>

                        </p>
                        <?php endif; ?>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">


                        <a href="#" class="btn btn-default btn-flat float-right btn-xs"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </li>
<?php /**PATH C:\xampp\htdocs\bums\resources\views/layouts/nav.blade.php ENDPATH**/ ?>