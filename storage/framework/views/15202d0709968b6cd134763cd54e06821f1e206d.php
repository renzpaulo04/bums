
 <?php if(Auth::user()->role == 'ADMIN'): ?>
<aside class="main-sidebar sidebar-dark-success elevation-4 bg-dark">
    <?php else: ?>
<aside class="main-sidebar sidebar-dark-success elevation-4 bg-purple">
    <?php endif; ?>
    <a href="" class="brand-link">
        <img src="<?php echo e(asset('/img/gasanLogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light"><?php echo e(config('app.name')); ?></span>

    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH C:\xampp\htdocs\bums\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>