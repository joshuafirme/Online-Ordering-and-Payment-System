<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David's Grill</title>
 <!-- bootstrap 3.0.2 -->
 <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- font Awesome -->
 <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- Ionicons -->
 <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="{{asset('css/beef_porkpg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .beefandpork{
           background:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)),
           url(/img/profile_bg.jpg) center/cover fixed no-repeat;
           color:#fff;
           grid-gap: 20px 40px;
           box-shadow: 0 8px 7px -2px gray;
       }
   </style>
    <style>
        body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
    </style>
</head>
<body>
    <div class ="beefandpork">
    <div class="heading">
        <h1>David's Grill Restaurant</h1>
    </div>
    <a href="{{url('/home')}}" class="btn btn-sm"><i class="fas fa-arrow-left fa-2x" style="color: #fff;"></i></a>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="{{asset('img/profile.svg')}}" width="75px" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h6 class="f-w-600">{{ Helper::getName() }}</h6>
                                    {{--<p>Web Designer</p>--}} <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                
                            @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check-circle"></i> </h5>
                              {{ \Session::get('success') }}
                            </div>      
                            @endif
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Profile Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{ Helper::getEmail()!=null ? Helper::getEmail() : "-" }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400">{{ Helper::getPhoneNo()!=null ? Helper::getPhoneNo() : "-" }}</h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Shipping Address</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Municipality</p>
                                            <h6 class="text-muted f-w-400">{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->municipality : "-" }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Brgy</p>
                                            <h6 class="text-muted f-w-400">{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->brgy : "-" }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Nearest landmark</p>
                                            <h6 class="text-muted f-w-400">{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->nearest_landmark : "-" }}</h6>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-primary" style="margin-top: 15px;" data-toggle="modal" data-target="#profileModal"><i class="fas fa-edit"></i> Edit</button>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <div class="modal-body">
          <form action="{{ action('Customer\ProfileCtr@updateInsert') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6">    
                    <label class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{ Helper::getName()!=null ? Helper::getName() : "" }}" required>
                  </div>

                  <div class="col-md-6">    
                    <label class="col-form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Helper::getEmail()!=null ? Helper::getEmail() : "" }}" required>
                  </div>

                  <div class="col-md-6">    
                    <label class="col-form-label" style="margin-top: 10px;">Phone</label>
                    <input type="text" class="form-control" name="phone_no" value="{{ Helper::getPhoneNo()!=null ? Helper::getPhoneNo() : "" }}" required>
                  </div>

                  <div class="col-md-12">    
                    <hr>
                  </div>

                  <div class="col-md-12">    
                    <h4>Shipping Address</h4>
                  </div>
 
              <div class="col-md-6">    
                 <label class="col-form-label" style="margin-top: 10px;">Municipality</label>
                 @php
                    $municipality = Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->municipality : "";
                    $mun_arr = array("Balayan", "Tuy");
                 @endphp
                 <select class="form-control" name="municipality" required> 
                    @if(in_array($municipality, $mun_arr))
                        <option selected value="{{ $municipality }}">{{ $municipality }}</option>
                        @php
                          $mun_arr = array_diff($mun_arr, array($municipality));
                        @endphp
                    @endif
                    @foreach ($mun_arr as $item)    
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach          
                 </select>
               </div>
 
               <div class="col-md-6">    
                 <label class="col-form-label" style="margin-top: 10px;">Barangay</label>
                 <input type="text" class="form-control" name="brgy" 
                 value="{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->brgy : "" }}" required>
               </div>

               <div class="col-md-12">    
                <label class="col-form-label" style="margin-top: 10px;">Nearest landmark</label>
                <input type="text" class="form-control" name="nearest_landmark" 
                value="{{ Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->nearest_landmark : "" }}" required>
              </div>
 
  
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
          </form>
          
        </div>
      </div>
  
    </div>
  </div>
  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- jQuery UI 1.10.3 -->
  <script src="{{asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
</body>