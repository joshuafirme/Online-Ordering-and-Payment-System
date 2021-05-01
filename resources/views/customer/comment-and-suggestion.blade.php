@include('customer.layouts.header2')

        <div class="container m-xs-2">
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row">

                        <div class="col-12" style="margin-bottom:310px;">
                            
                            <form role="form" action="{{action('Customer\CommentAndSuggestionCtr@store')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    
                                    @if(\Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fa fa-check-circle"></i> </h5>
                                    {{ \Session::get('success') }}
                                    </div>      
                                    @endif

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Comment</label>
                                        <textarea class="form-control" name="comment" placeholder="Enter your comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Suggestion</label>
                                        <textarea class="form-control" name="suggestion" placeholder="Enter your suggestion"></textarea>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
