<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.index') }}"><img src="{{ asset('client/img/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::path() == 'admin/index' ? 'active' :  '' }}">
                        <a href="{{ route('admin.index') }}" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>Index</span></a>
                        {{-- <ul class="collapse">
                            <li><a href="index.html">ICO dashboard</a></li>
                            <li><a href="index2.html">Ecommerce dashboard</a></li>
                            <li><a href="index3.html">SEO dashboard</a></li>
                        </ul> --}}
                    </li>

                    <li class="{{ Request::path() == 'admin/management' ? 'active' : '' }}">
                        <a href="{{ route('admin.manage') }}"><i class="ti-map-alt"></i> <span>Manage
                                Bill</span></a>
                    </li>

                    <li
                        class="{{ (Request::path() == 'admin/product' ? 'active' : Request::path() == 'admin/product/create') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-slice"></i><span>Product</span></a>
                        <ul class="collapse">
                            <li class="{{ Request::path() == 'admin/product' ? 'active' : '' }}">
                                <a href="{{ route('product.index') }}">All Products</a>
                            </li>
                            <li class="{{ Request::path() == 'admin/product/create' ? 'active' : '' }}">
                                <a href="{{ route('product.create') }}">Create New Product</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ (Request::path() == 'admin/product-type' ? 'active' : Request::path() == 'admin/product-type/create') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                            <span>Product Type</span></a>
                        <ul class="collapse">
                            <li class="{{ Request::path() == 'admin/product-type' ? 'active' : '' }}">
                                <a href="{{ route('product-type.index') }}">All Product Type</a>
                            </li>
                            <li class="{{ Request::path() == 'admin/product-type/create' ? 'active' : '' }}">
                                <a href="{{ route('product-type.create') }}">Create New Product Type</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ ((Request::path() == 'admin/create-new-admin' ? 'active' : Request::path() == 'admin/manage-admin-account') ? 'active' : Request::path() == 'admin/manage-customer-account') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Manage
                                Account</span></a>
                        <ul class="collapse">
                            <li class="{{ Request::path() == 'admin/create-new-admin' ? 'active' : '' }}">
                                <a href="{{ route('admin.formNewAdmin') }}">
                                    Create New Admin</a>
                            </li>

                            <li class="{{ Request::path() == 'admin/manage-admin-account' ? 'active' : '' }}">
                                <a href="{{ route('admin.manageAdmin') }}">All Admin</a>
                            </li>
                            <li class="{{ Request::path() == 'admin/manage-customer-account' ? 'active' : '' }}">
                                <a href="{{ route('admin.manageCustomer') }}">All Customer</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
