<ul class="sidebar-menu">
    <li>
        <a href="{{ url('/') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dollar"></i>
            <span>Transaction</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('transaction/cashiering') }}"><i class="fa fa-angle-double-right"></i> Cashiering</a></li>
            <li><a href="{{ url('transaction/delivery') }}"><i class="fa fa-angle-double-right"></i> Delivery</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-o"></i>
            <span>Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('reports/customer-info') }}"><i class="fa fa-users"></i> Customer Information</a></li>
            <li><a href="{{ url('reports/gross_sale') }}"><i class="fa fa-dollar"></i> Gross Sale</a></li>
            <li><a href="{{ url('reports/best_seller') }}"><i class="fa fa-bar-chart-o"></i> Best Seller</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Maintenance</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li><a href="{{ url('maintenance/category') }}"><i class="fa fa-angle-double-right"></i> Category</a></li>
            <li><a href="{{ url('maintenance/menu') }}"><i class="fa fa-angle-double-right"></i> Menu</a></li>
            <li><a href="{{ url('maintenance/gallery') }}"><i class="fa fa-angle-double-right"></i> Gallery</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Utilities</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li><a href="{{ url('utilities/user') }}"><i class="fa fa-angle-double-right"></i> User</a></li>
            <li><a href="{{ url('utilities/audit-trail') }}"><i class="fa fa-angle-double-right"></i> Audit Trail</a></li>
            <li><a href="{{ url('utilities/backup-and-restore') }}"><i class="fa fa-angle-double-right"></i> Backup and Restore</a></li>
        </ul>
    </li>
</ul>