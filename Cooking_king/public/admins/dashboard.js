// $(function() {

// });
$(document).ready(function(){

var urlSta = "{{ url('/filter-by-date') }}";
      
      
var chart =   new Morris.Area({
              // ID of the element in which to draw the chart.
              element: 'myfirstchart',
              lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
              pointFillColors:['#ffffff'],
              pointStrikeColors:['black'],
                fillOpacity:0.3,
                hideHover:'autp',
                parseTime: false,
              // Chart data records -- each entry in this array corresponds to a point on
              // the chart.
              data: [
                { period: '2008', value: 20 },
                { period: '2009', value: 10 },
                { period: '2010', value: 5 },
                { period: '2011', value: 5 },
                { period: '2012', value: 20 }
              ],
              // The name of the data record attribute that contains x-values.
              xkey: 'period',
              // A list of names of data record attributes that contain y-values.
              ykeys: ['order','sales','profit','quantity'],
              // Labels for the ykeys -- will be displayed when you hover over the
              // chart.
              labels: ['order','sales','profit','quantity']
            });










    $('#btn-dashboard-filter').click(function(){
       var _token = $('input[name="_token"]').val();
       var from_date = $('#datepicker').val();
       var to_date = $('#datepicker2').val();
      
       $.ajax({
         url:urlSta ,
         method: "POST",
         dateType: "JSON",
         data:{from_date:from_date,to_date:to_date,_token:_token},

         success:function(data)
         {
           chart.setData(data)
         }
       })
  });
 })

    