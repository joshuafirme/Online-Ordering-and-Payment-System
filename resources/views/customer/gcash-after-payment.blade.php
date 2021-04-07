
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
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class ="beefandpork">
        <div class="heading">
            <h1>David's Grill Restaurant</h1>
        </div>

                </div>
                </div>
            </div>


            <div class="container">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row">
          
                            <div class="col-sm-12" style="margin-top:20px;" align="center">
                                
                            @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check-circle"></i> </h5>
                              {{ \Session::get('success') }}
                            </div>      
                            @endif
                                <div class="card-block">
       
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="text-center m-0">Your payment of ₱<b>{{ number_format(\Session::get('TOTAL_CHECKOUT'),2,'.',',') }}</b>
                                            was successfully paid! Order is being processed...</h4>
                                        <p class="text-center">Continue <a href="{{ url('/') }}">homepage</a></p>
                                      </div>
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

</body>