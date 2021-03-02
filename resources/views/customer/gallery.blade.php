@extends('customer.layouts.main')

@section('content')

<style>
    .img-gallery{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .img-gallery:hover{
         transform: translateY(-5px);
         box-shadow: 0 8px 16px 0 rgba(1,1,0,0.5);
    }
</style>


    <div class="container">
   
        <section class="content-header">
            <h1>
                Gallery 
            </h1>
            <hr>
        </section>

        <section class="content">

            <div class="row">
                @foreach ($gallery as $data)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" style="margin-top: 30px;">
                        <img class="img-gallery img-responsive img-thumbnail" src="{{ asset('storage/'. $data->image) }}" style="height: 320px; width:500px;" alt={{$data->image}}>
                    </div>
                @endforeach   
            </div>
    
            <div class="pl-2">
                {{ $gallery->links() }}
            </div> 
    
        </section><!-- /.content -->
    </div>

@endsection