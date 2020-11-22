<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
    <li class="m-menu__item  m-menu__item--active " aria-haspopup="true">
        <a href="{{ route('admin.dashboard.view') }}" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text">{{__('text.dashboard')}}
                </span></a>
            </li>
    @can('slider')
    <li class="m-menu__item" aria-haspopup="true">
        <a href="/admin/slider" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text">سلايدر
                </span></a>
    </li>
    @endcan
    @can('social')
    <li class="m-menu__item " aria-haspopup="true">
        <a href="/admin/social" class="m-menu__link "><span class="m-menu__link-text">وسائل التواصل الاجتماعي
    </span></a>
    </li>
    @endcan  
    @can('our_clients')
    <li class="m-menu__item" aria-haspopup="true">
        <a href="/admin/our_clients" class="m-menu__link "><span class="m-menu__item-here">
            </span><span class="m-menu__link-text">عملائنا
                </span></a>
    </li>
    @endcan  
   
    @can('static_service')
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/service" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">خدماتنا</span>
        </a>
    </li>
    @endcan  

    @can('products')
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/products" class="m-menu__link ">
            <span class="m-menu__link-text">منتجاتنا</span>
        </a>
    </li> 
    @endcan 

    @can('business')
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/business" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">اعمالنا</span>
        </a>
    </li> 
    @endcan 
    
    @can('business')
    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
        <a href="/admin/statistics" class="m-menu__link ">
            <!-- <i class="m-menu__link-icon fas fa-users-cog"></i> -->
            <span class="m-menu__link-text">الإحصائيات</span>
        </a>
    </li> 
    @endcan 

    
    <li id="top-cart" class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
    <a href="/admin/project_request" class="m-menu__link ">
        <span class="m-menu__link-text">طلبات المشاريع </span>
    </a>
</li>  

@can('contact')
<li id="top-cart" class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
    <span class="cart-count">0 </span>
    <a href="/admin/contact" class="m-menu__link ">
        <span class="m-menu__link-text">الدعم الفني </span>
    </a>
</li>  
@endcan
    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><span
             class="m-menu__link-text">{{__('text.setting')}}</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
            <ul class="m-menu__subnav">
                @can('setting')
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="{{route('admin.setting.index')}}" class="m-menu__link ">
                        <i class="m-menu__link-icon fa fa-cog"></i>
                        <span class="m-menu__link-text">{{__('text.setting')}} </span>
                    </a>
                </li>
                @endcan
                @can('system_constants')
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="{{route('admin.system_constants.index')}}" class="m-menu__link ">
                        <i class="m-menu__link-icon fa fa-cog"></i>
                        <span class="m-menu__link-text">{{__('text.system_constants')}} </span>
                    </a>
                </li>
                @endcan
                @can('users')
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="{{route('admin.users.index')}}" class="m-menu__link ">
                        <i class="m-menu__link-icon fas fa-users-cog"></i>
                        <span class="m-menu__link-text">{{__('text.users')}} </span>
                    </a>
                </li>  
                @endcan
                @can('static_page')
                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                    <a href="/admin/static_page" class="m-menu__link ">
                        <i class="m-menu__link-icon fas fa-users-cog"></i>
                        <span class="m-menu__link-text">الصفحات الثابتة </span>
                    </a>
                </li>  
                @endcan
               
             
            </ul>
        </div>
    </li>

</ul>
