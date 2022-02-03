@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Client Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daily Client Entry</li>
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
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Daily Entry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('dailyentry.store')}}" method="POST"> 
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="date">DATE</label>
                    <input type="date" name="date_of_entry" min="2021-03-31"/>
                  </div>
                  <div class="form-group">
                    <label for="clientname"> SELECT CLIENT</label>
                    <input type="text" class="form-control" name="client_id" placeholder="Enter Client Name" list="clientname">
                    <datalist id="clientname">
                      @foreach($clientt as $cl)
                        <option value="{{$cl->id}}">{{$cl->client_name}}</option>
                      @endforeach
                    </datalist>
                  </div>
                  <div class="form-body">
                    <div class="card-body">
                      <div class="form-group fieldGroup">
                        <div class="input-group">
                          <div class="row">
                            <div class="col-md-4 form-group">
                              <label for="hawbnumber">HAWB NUMBER</label>
                              <input type="text" class="form-control"name="hawb_number[]" placeholder="Enter HAWB NUMBER">
                            </div>
                            <div class="col-md-4 form-group">
                              <label for="type"> SELECT TYPE</label> 
                              <input type="text" class="form-control" placeholder="SELECT TYPE" name="weight_cost[]" list="type">
                              <datalist id="type">
                                <option>DOX<option>
                                <option>PARCEL<option>
                              </datalist>
                            </div>
                            <div class="col-md-4 form-group">
                              <label for="weight">WEIGHT</label> 
                              <input type="text" class="form-control" placeholder="ENTER WEIGHT" name="weight_range[]">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 form-group">
                              <label for="station">STATION</label>
                              <input type="text" class="form-control" name="destination[]" placeholder="Select station" list="stationname">
                                <datalist id="stationname">
                                  @foreach($stationn as $st)
                                  <option>{{$st->station}}</option>
                                  @endforeach
                                </datalist>
                            </div>
                            <div class="col-md-4 form-group">
                              <label for="mode">MODE</label>
                              <input type="text" class="form-control" placeholder="SELECT  MODE" name="mode[]" list="modes">
                                <datalist id="modes">
                                  <option>AIR</option>
                                  <option>SURFACE</option>
                                </datalist>  
                            </div>
                            <div class="col-md-4 form-group">
                              <label for="Cost">TOTAL CHARGES</label>
                              <input type="text" class="form-control" name="total_charges[]" placeholder="CHARGES">
                            </div>
                          </div>
                          <div class="input-group-addon"> 
                            <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>Add More</a>
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
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="hawbnumber">HAWB NUMBER</label>
                      <input type="text" class="form-control"name="hawb_number[]" placeholder="Enter HAWB NUMBER">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="type"> SELECT TYPE</label> 
                      <input type="text" class="form-control" placeholder="SELECT TYPE" name="weight_cost[]" list="type">
                        <datalist id="type">
                          <option>DOX<option>
                          <option>PARCEL<option>
                        </datalist>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="weight">WEIGHT</label>
                      <input type="text" class="form-control" placeholder="ENTER WEIGHT" name="weight_range[]">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="station">STATION</label>
                      <input type="text" class="form-control" name="destination[]" placeholder="Select station" list="stationname">
                        <datalist id="stationname">
                          @foreach($stationn as $st)
                          <option>{{$st->station}}</option>
                          @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="mode">MODE</label>
                      <input type="text" class="form-control" placeholder="SELECT  MODE" name="mode[]" list="modes">
                        <datalist id="modes">
                          <option>AIR</option>
                          <option>SURFACE</option>
                        </datalist>  
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="Cost">TOTAL CHARGES</label>
                      <input type="text" class="form-control" name="total_charges[]" placeholder="CHARGES">
                    </div>
                  </div>
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
