<nav class="col-md-2 d-none d-md-block bg-light sidebar mt-2">
    <div class="sidebar-sticky">
        <ul class="nav flex-column" data-widget="tree" data-api="tree">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <li class="header">Danh mục</li>
            
            <!-- Danh mục Sản phẩm -->
            <li class="treeview {{ Request::is('backend/sanpham*') ? 'menu-open' : '' }}">
            <a href="#"><span>Danh mục sản phẩm</span>
            </a>
            <ul class="treeview-menu" style="display: {{ Request::is('backend/sanpham*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('backend/sanpham') ? 'active' : '' }}"><a href="{{ route('backend.sanpham.index') }}">Danh sách sản phẩm</a></li>
                <li class="{{ Request::is('backend/sanpham/create') ? 'active' : '' }}"><a href="{{ route('backend.sanpham.create') }}">Thêm mới sản phẩm</a></li>
            </ul>
            </li>
        <!-- /.Danh mục Sản phẩm -->
    </div>
</nav>