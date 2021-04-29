@extends('layouts.main')

@section('content')

   
   <!-- Right side column. Contains the navbar and content of the page -->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $newOrders }}
                </h3>
                <p>
                    New Orders
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $walkInSales }}
                </h3>
                <p>
                    Total walk-in sales totay
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $registeredCustomer }}
                </h3>
                <p>
                    User Registrations
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $onlineSales }}
                </h3>
                <p>
                    Total online sales totay
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="margin-top: 15px;">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ Helper::countPending() }}
                </h3>
                <p>
                    Pending
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-android-note"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="margin-top: 15px;">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ Helper::countPreparing() }}
                </h3>
                <p>
                    Preparing
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-utensil-spoon"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="margin-top: 15px;">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ Helper::countDispatch() }}
                </h3>
                <p>
                    Dispatch
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="margin-top: 15px;">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ Helper::countDelivered() }}
                </h3>
                <p>
                    Delivered
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-check-circle"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="margin-top: 15px;">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ Helper::countCancelled() }}
                </h3>
                <p>
                    Cancelled
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-cross"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->


    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->



@endsection