@inject('menuRoles', 'App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $user = auth()->guard('admins')->user();
    $menu = [

    ];
@endphp
@inject('menuService', '\App\Modules\User\Services\MenuService')
<div class="sidebar-content">
    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">

        <div class="category-content no-padding">

            <ul class="navigation navigation-main navigation-accordion">
                <!-- Main -->
                <li class="navigation-header"><h5><i class="icon-windows" title="Menu"></i>   Menu</h5>
                </li>
                @if($user->user_type == 'super_admin' || $user->user_type == 'admin')

                     
 
                   
                    @if($menuRoles->assignedRoles('product.index'))
                        <li {{$menuService->activeMenu($currentRoute,['product.index'])}}>
                            <a href="#"><i class="icon-stack4"></i> <span>Product</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('product.index')}}" id="layout1">
                                        <i class="icon-list"></i><span>Today's List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('product.create')}}" id="layout1">
                                        <i class="icon-plus2"></i>
                                        <span>Add Today's Product</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif 
                    @if($menuRoles->assignedRoles('office.index'))
                        <li {{$menuService->activeMenu($currentRoute,['office.index'])}}>
                            <a href="#"><i class="icon-stack4"></i> <span>Office</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('office.index')}}" id="layout1">
                                        <i class="icon-list"></i><span>List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('office.create')}}" id="layout1">
                                        <i class="icon-plus2"></i>
                                        <span>Create</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif 
                    @if($menuRoles->assignedRoles('seller.index'))
                        <li {{$menuService->activeMenu($currentRoute,['seller.index'])}}>
                            <a href="#"><i class="icon-stack4"></i> <span>Seller</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('seller.index')}}" id="layout1">
                                        <i class="icon-list"></i><span>List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('seller.create')}}" id="layout1">
                                        <i class="icon-plus2"></i>
                                        <span>Create</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                        @if($menuRoles->assignedRoles('staff.index'))
                            <li {{$menuService->activeMenu($currentRoute,['staff.index'])}}>
                                <a href="#"><i class="icon-stack4"></i> <span>Staff</span></a>
                                <ul>
                                    <li>
                                        <a href="{{route('staff.index')}}" id="layout1">
                                            <i class="icon-list"></i><span>List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('staff.create')}}" id="layout1">
                                            <i class="icon-plus2"></i>
                                            <span>Create</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if($menuRoles->assignedRoles('contact.index'))
                            <li {{$menuService->activeMenu($currentRoute,['contact.index'])}}>
                                <a href="#"><i class="icon-stack4"></i> <span>Contact</span></a>
                                <ul>
                                    <li>
                                        <a href="{{route('contact.index')}}" id="layout1">
                                            <i class="icon-list"></i><span>List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact.create')}}" id="layout1">
                                            <i class="icon-plus2"></i>
                                            <span>Create</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if($menuRoles->assignedRoles('category.index'))
                            <li {{$menuService->activeMenu($currentRoute,['category.index'])}}>
                                <a href="#"><i class="icon-stack4"></i> <span>Category</span></a>
                                <ul>
                                    <li>
                                        <a href="{{route('category.index')}}" id="layout1">
                                            <i class="icon-list"></i><span>List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('category.create')}}" id="layout1">
                                            <i class="icon-plus2"></i>
                                            <span>Create</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if($menuRoles->assignedRoles('order.index'))
                            <li {{$menuService->activeMenu($currentRoute,['order.index'])}}>
                                <a href="#"><i class="icon-stack4"></i> <span>Order</span></a>
                                <ul>
                                    <li>
                                        <a href="{{route('order.index')}}" id="layout1">
                                            <i class="icon-list"></i><span>List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('order.create')}}" id="layout1">
                                            <i class="icon-plus2"></i>
                                            <span>Create</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif











                        {{-- @if($menuRoles->assignedRoles('setting.create'))
                                <li {{$menuService->activeMenu($currentRoute,['setting.create'])}}>
                                    <a href="{{route('setting.create')}}"><i class="icon-gear"></i>
                                        <span>Settings</span></a>
                                </li>
                            @endif
                        --}}
                @endif

                 
            </ul>
        </div>
    </div>
    <!-- /main navigation -->

</div>
