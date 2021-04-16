<ul class="sidebar-menu">
    
    <li>
        <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    @php
        $position=Helper::getPosition();
    @endphp
    @if($position=='Admin')

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Transaction <span class="badge badge-success">{{ \Helper::countDeliveryNotif()!=0 ? \Helper::countDeliveryNotif() : "" }}</span></span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('transaction/cashiering') }}"><i class="fa fa-dollar"></i> Cashiering</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Delivery</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('delivery/pending') }}"><i class="fa fa-angle-double-right"></i> Pending 
                        <span class="badge badge-success">{{ \Helper::countPending()!=0 ? \Helper::countPending() : "" }}</span></a></li>
                    <li><a href="{{ url('delivery/preparing') }}"><i class="fa fa-angle-double-right"></i> Preparing 
                        <span class="badge badge-success">{{ \Helper::countPreparing()!=0 ? \Helper::countPreparing() : "" }}</span></a></li>
                    <li><a href="{{ url('delivery/dispatch') }}"><i class="fa fa-angle-double-right"></i> Dispatch 
                        <span class="badge badge-success">{{ \Helper::countDispatch()!=0 ? \Helper::countDispatch() : "" }}</span></a></li>
                    <li><a href="{{ url('delivery/delivered') }}"><i class="fa  fa-angle-double-right"></i> Delivered</a></li>
                    <li><a href="{{ url('delivery/cancelled') }}"><i class="fa fa-angle-double-right"></i> Cancelled</a></li>
                </ul>
            </li>
        </ul>
    </li>

        <li>
        <a href="{{ url('/identity-verification') }}">
            <i class="fa fa-user"></i> <span>Identity Verification</span>
        </a>
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
            <li><a href="{{ url('reports/best-seller') }}"><i class="fa fa-bar-chart-o"></i> Best Seller</a></li>
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
            <li><a href="{{ url('utilities/comment-and-suggestion') }}"><i class="fa fa-angle-double-right"></i> Comments and Suggestion</a></li>
            <li><a href="{{ url('utilities/audit-trail') }}"><i class="fa fa-angle-double-right"></i> Audit Trail</a></li>
           {{-- <li><a href="{{ url('utilities/backup-and-restore') }}"><i class="fa fa-angle-double-right"></i> Backup and Restore</a></li>--}}
        </ul>
    </li>
    @elseif($position=='Cashier' || $position=='Receptionist')
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
    @endif
</ul>