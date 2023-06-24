@extends('layouts.admin')

@section('title')
    <title>Dashboard</title>
@endsection
@section('css')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


<style>
    .filter {
    display: flex;
    margin-top: 50px;
    
}
.title_thongke{
    text-align: center;
    font-size: 30px;
    font-weight: 600;
    margin-top: 20px;
    }
    .statistical1 {
    padding-left: 10px;
    padding-right: 10px;
}
</style>
@endsection
@section('js')

    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script>
        $( "#datepicker" ).datepicker({
                dateFormat:"yy-mm-dd"
            });
        $( "#datepicker2" ).datepicker({
                dateFormat:"yy-mm-dd"
            });
    </script>
    {{-- <script type="text/javascript" src="{{ asset('admins/dashboard.js') }}"></script> --}}

    <script>
    $(document).ready(function(){


      chart30daysorder();
      
        var chart = new Morris.Area({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
                    fillOpacity:0.3,
                    hideHover:'auto',
                    parseTime: false,
              
                
                
                xkey: 'period',
                ykeys: ['order','sales','profit','quantity'],
                behaveLikeLine:true,
                
                labels: ['order','sales','profit','quantity']
                });
              
              function chart30daysorder(){
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                    url:"{{ route('statistical.dayorder') }}",
                    method:"POST",
                    dataType:"JSON",
                    data:{_token:_token},
                    success:function(data){
                      chart.setData(data)
                    }
                 });
              }
             
        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                    url:"{{ route('statistical.change') }}",
                    method:"POST",
                    dataType:"JSON",
                    data:{_token:_token,dashboard_value:dashboard_value},
                    success:function(data){
                      chart.setData(data)
                      
                    }
                 });
        });



        $('#btn-dashboard-filter').click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        
        $.ajax({
            url:"{{ route('statistical.filter_by_date') }}" ,
            method: "POST",
            dataType: "JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},

            success:function(data)
            {
                
                chart.setData(data);
                
         
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
            
        });
    });
    })
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
@endsection



@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Statistic', 'key' => 'view'])
    <div class="statistical1">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$products}}</h3>
    
                  <p>total product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$order_items}}</h3>
    
                  <p>total Order</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('bills.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$users}}</h3>
    
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$comments}}</h3>
    
                  <p>total comment</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
            <p class="title_thongke">order statistics</p>
            <form autocomplete="off">
                @csrf
                <div class="filter">
                    <div class="col-md-2">
                        <p>from date: <input type="text" id="datepicker" class="form-control"></p>
                        <p><input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="filter result"></p>
                    </div>
                    <div class="col-md-2">
                        <p>to date: <input type="text" id="datepicker2" class="form-control"></p>
                    </div>
                    <div class="col-md-2">
                      <p>filter follow:
                          <select class="dashboard-filter form-control">
                            <option>--chosse--</option>
                            <option value="last7day">last 7 day</option>
                            <option value="lastmonth">last month</option>
                            <option value="month">this month</option>
                            <option value="365day">365 day</option>
                          </select>
                      </p>
                        
                    </div>
                    
                </div>
                
            </form>
            <div class="col-md-12">
                <div id="myfirstchart" style="height: 250px;">
    
                </div>
            </div>
        
    </div>
    

</div> 
       

      


@endsection

