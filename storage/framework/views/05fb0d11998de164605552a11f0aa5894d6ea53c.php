<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
    <li class="m-menu__item  m-menu__item--active " aria-haspopup="true">
        <a href="<?php echo e(route('admin.dashboard.view')); ?>" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text"><?php echo e(__('text.dashboard')); ?>

                </span></a>
            </li>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider')): ?>
    <li class="m-menu__item" aria-haspopup="true">
        <a href="/admin/slider" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text">سلايدر
                </span></a>
    </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('social')): ?>
    <li class="m-menu__item " aria-haspopup="true">
        <a href="/admin/social" class="m-menu__link "><span class="m-menu__link-text">وسائل التواصل الاجتماعي
    </span></a>
    </li>
    <?php endif; ?>  
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('our_clients')): ?>
    <li class="m-menu__item" aria-haspopup="true">
        <a href="/admin/our_clients" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text">عملائنا
                </span></a>
    </li>
    <?php endif; ?>  
   
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('static_service')): ?>
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/service" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">خدماتنا</span>
        </a>
    </li>
    <?php endif; ?>  

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/products" class="m-menu__link ">
            <span class="m-menu__link-text">منتجاتنا</span>
        </a>
    </li> 
    <?php endif; ?> 

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business')): ?>
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/business" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">اعمالنا</span>
        </a>
    </li> 
    <?php endif; ?> 
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business')): ?>
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/statistics" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">الإحصائيات</span>
        </a>
    </li> 
    <?php endif; ?> 

    
    <li id="top-cart" class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
    <a href="/admin/project_request" class="m-menu__link ">
        <span class="m-menu__link-text">طلبات المشاريع </span>
    </a>
</li>  

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact')): ?>
<li id="top-cart" class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
    <span class="cart-count">0 </span>
    <a href="/admin/contact" class="m-menu__link ">
        <span class="m-menu__link-text">الدعم الفني </span>
    </a>
</li>  
<?php endif; ?>
    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><span
             class="m-menu__link-text"><?php echo e(__('text.setting')); ?></span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
            <ul class="m-menu__subnav">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="<?php echo e(route('admin.setting.index')); ?>" class="m-menu__link ">
                        <i class="m-menu__link-icon fa fa-cog"></i>
                        <span class="m-menu__link-text"><?php echo e(__('text.setting')); ?> </span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system_constants')): ?>
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="<?php echo e(route('admin.system_constants.index')); ?>" class="m-menu__link ">
                        <i class="m-menu__link-icon fa fa-cog"></i>
                        <span class="m-menu__link-text"><?php echo e(__('text.system_constants')); ?> </span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="m-menu__link ">
                        <i class="m-menu__link-icon fas fa-users-cog"></i>
                        <span class="m-menu__link-text"><?php echo e(__('text.users')); ?> </span>
                    </a>
                </li>  
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('static_page')): ?>
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="/admin/static_page" class="m-menu__link ">
                        <i class="m-menu__link-icon fas fa-users-cog"></i>
                        <span class="m-menu__link-text">الصفحات الثابتة </span>
                    </a>
                </li>  
                <?php endif; ?>
               
             
            </ul>
        </div>
    </li>

</ul>
<?php /**PATH E:\tejartek\resources\views/admin/layout/top_menu.blade.php ENDPATH**/ ?>