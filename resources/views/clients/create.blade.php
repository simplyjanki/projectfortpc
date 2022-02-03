@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Entry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Client Entry Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Client Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('success'))
                <div class="alert alert-3">
                  {{Session::get('success')}}
                </div>
              @endif
              <form action="{{route('client.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="clientname"> Client Name</label>
                        <input type="text" class="form-control" name="client_name" placeholder="Enter Client Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gstnumber">GST NUMBER</label>
                        <input type="text" class="form-control" placeholder="Gst number" name="gst_number">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="contactnumber">CONTACT NUMBER</label>
                        <input type="number" class="form-control" placeholder="Contact number" name="contact">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">ADDRESS</label>
                        <input type="textarea" class="form-control" placeholder="Address" name="address">
                      </div>
                    </div>
                  </div>
                </div>
                  
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">ADD PRICING</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group fieldGroup">
                        <div class="input-group">
                          <select name="mode_of_pricing[]" class="form-control">
                            <option selected disabled>SELECT TYPE</option>
                            <option>DOX</option>
                            <option>PARCEL</option>
                          </select>
                            <input type="text" name="weight[]" class="form-control" placeholder="Enter Weight"/>
                            <input type="text" name="station[]" class="form-control" placeholder="Enter Station Name"/>
                            <select name="mode_of_convience[]" class="form-control">
                              <option selected disabled>SELECT MODE</option>
                              <option>AIR</option>
                              <option>SURFACE</option>
                            </select>
                            <input type="text" name="cost[]" class="form-control" placeholder="Enter Cost"/>
                            <div class="input-group-addon"> 
                                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
               <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

                <div class="form-group fieldGroupCopy" style="display: none;">
                  <div class="input-group">
                      <select name="mode_of_pricing[]" class="form-control">
                        <option selected disabled>SELECT TYPE</option>
                        <option>DOX</option>
                        <option>PARCEL</option>
                      </select>
                      <input type="text" name="weight[]" class="form-control" placeholder="Enter Weight"/>
                      <input type="text" name="station[]" class="form-control" placeholder="Enter Station Name"/>
                            <select name="mode_of_convience[]" class="form-control">
                              <option selected disabled>SELECT MODE</option>
                              <option>AIR</option>
                              <option>SURFACE</option>
                            </select>
                      <input type="text" name="cost[]" class="form-control" placeholder="Enter Cost"/>
                      <div class="input-group-addon"> 
                          <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
  });
</script>

@endsection