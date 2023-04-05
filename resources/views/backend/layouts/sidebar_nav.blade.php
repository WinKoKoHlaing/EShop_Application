<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
   <ul class="app-menu">
      <li>
         <a href="{{ route('dashboard') }}" class="app-menu__item {{ Request::is('admin/dashboard') ? 'active':'' }}" href="dashboard.html">
            <i class="app-menu__icon fa fa-chart-bar"></i>
            <span class="app-menu__label">Dashboard</span>
         </a>
      </li>
      
      <li class="treeview">
         <a href="#" class="app-menu__item {{ Request::is('admin/category*') ? 'active':'' }}" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-th-list"></i>
            <span class="app-menu__label">Category</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
         </a>
         <ul class="treeview-menu">
            <li>
               <a href="{{ route('category.index') }}" class="treeview-item" href="table-basic.html">
                  <i class="icon fa fa-circle-o"></i> Category Lists
               </a>
            </li>
         </ul>
         <ul class="treeview-menu">
            <li>
               <a href="{{ route('category.create') }}" class="treeview-item href="table-basic.html">
                  <i class="icon fa fa-circle-o"></i> Add Category
               </a>
            </li>
         </ul>
      </li>

      <li class="treeview">
         <a href="#" class="app-menu__item {{ Request::is('admin/product*') ? 'active':'' }}" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-th-list"></i>
            <span class="app-menu__label">Product</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
         </a>
         <ul class="treeview-menu">
            <li>
               <a href="{{ route('product.index') }}" class="treeview-item" href="table-basic.html">
                  <i class="icon fa fa-circle-o"></i> Product Lists
               </a>
            </li>
         </ul>
         <ul class="treeview-menu">
            <li>
               <a href="{{ route('product.create') }}" class="treeview-item href="table-basic.html">
                  <i class="icon fa fa-circle-o"></i> Add Product
               </a>
            </li>
         </ul>
      </li>

      <li>
         <a href="{{ route('order') }}" class="app-menu__item {{ Request::is('admin/order*') ? 'active':'' }}" href="dashboard.html">
            <i class="app-menu__icon fa fa-chart-line"></i>
            <span class="app-menu__label">Order</span>
         </a>
      </li>

      <li>
         <a href="{{ route('users') }}" class="app-menu__item {{ Request::is('admin/users*') ? 'active':'' }}" href="dashboard.html">
            <i class="app-menu__icon fa fa-users"></i>
            <span class="app-menu__label">User</span>
         </a>
      </li>

   </ul>
 </aside>