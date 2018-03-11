<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo e(route('voyager.dashboard')); ?>">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        <?php if($admin_logo_img == ''): ?>
                            <img src="<?php echo e(voyager_asset('images/logo-icon-light.png')); ?>" alt="Logo Icon">
                        <?php else: ?>
                            <img src="<?php echo e(Voyager::image($admin_logo_img)); ?>" alt="Logo Icon">
                        <?php endif; ?>
                    </div>
                    <div class="title">Openensat</div>
                </a>
            </div><!-- .navbar-header -->


        </div>

        <?php echo menu('admin', 'admin_menu'); ?>

    </nav>
</div>
