
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
                <section class="content" style="margin-top: 15px;">
                    @if(\Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-circle"></i> </h5>
                    {{ \Session::get('invalid') }}
                    </div>      
                    @endif
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <div class="box box-primary">
                                <h3 class="mb-2">Select payment method</h3>
                                <a href="/gcash-payment" class="btn btn-sm btn-primary" style="width: 200px;">Gcash</a>
                                <a href="/cod" class="btn btn-sm btn-primary" style="width: 200px;">Cash on delivery</a>

                                <p style="margin-top: 40px;">Total Amount to be paid</p>
                                      <h3 class="text-success">₱{{ number_format(\Session::get('TOTAL_CHECKOUT'),2,'.',',') }}</h3>
                            </div>
                        </div>
                    </div>
            
            
                </section>
            </div>

    </div>

</body>