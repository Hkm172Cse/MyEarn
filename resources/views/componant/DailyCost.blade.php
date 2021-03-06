@extends('layout.master')
@section('content')
<div class="row">
     <div class="col-6">
        <!-- Button trigger modal -->
            <button type="button" class="btn-sm btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Cost</button>

        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"           
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add your Daily Cost</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="cost_form">
                        <div class="form-group">
                            <label for="">Cost Event</label>
                            <input type="text" id="costName"  class="form-control">
                          </div>
                          <div class="form-group">
                                <label for="eventName">category</label>
                                
                                <select class="form-control" id="eventName">
                                    <option value="no catagory">select catagory</option>
                                    @foreach($events as $events)
                                    <option value="{{$events->event_name}}">
                                        {{$events->event_name}}
                                    </option>
                                    @endforeach
                                </select>
                          </div>

                          <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" id="amount"  class="form-control">
                          </div>
                        </form>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="submitCost" class="btn btn-sm btn-primary">save cost</button>
                    </div>
                    </div>
                </div>
            </div>
        <!--Modal End-->
    </div>
    <div class="col-6"> 
                                <div class="basic-dropdown">
                                    <div class="dropdown">
                                        <button type="button" id="my_toggle" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">Select Cost</button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" id="today" href="#">Today</a> 
                                          
                                          <a class="dropdown-item" id="thisMonth" href="#">This Mounth</a>
                                          <a class="dropdown-item"  href="#"><button class="btn-sm btn btn-danger" id="customDate">custom date</button><input id="custom_date_get" placeholder="yyyy-mm-dd" type="text" class="form-control"></a>
                                        </div>
                                    </div>
                                </div>  
                            
                        
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <div class="form-group">
                                    
            <select class="form-control" id="category">
                <option value="">select category</option>
                @foreach($eve as $val)
                <option id="select_option" value="{{$val->event_name}}">
                    {{$val->event_name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
        <!--Start Table-->
        
        <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 id="table_name" class="m-0 font-weight-light text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class='text-center'>Event</th>
                                            <th class='text-center'>Amount</th>
                                            <th class='text-center'>Issue Date</th> 
                                        </tr>
                                    </thead>
                                    <tfoot id="total_row">
                                        
                                    </tfoot>
                                    <tbody  id="cost_table">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
        
        
        <!--End Table-->


           
    


@endsection

@section('script')

<script>
$('#category').click(function(){
   $('#my_toggle').html("select One"); 
})
$('#thisMonth').click(function(){
      $(this).addClass('active');
      $('#today').removeClass('active');
      $('#my_toggle').html("This Month");
      $('#table_name').html("?????? ??????????????? ?????????");
        let today = new Date();
        let date = today.getDate();
        
        let month = today.getMonth();
        let currentM = month + 1;
        let year =today.getFullYear();
        $('#total_row').empty();
        $('#cost_table').empty();
        
        
        var getCustomDate = `${year}-${currentM < 10 ?'0':''}${currentM}`
        var category = $('#category').val();
        console.log(category);
        console.log(getCustomDate)

        axios.post('/selectCostDatewise',{
            getCustomDate:getCustomDate,
            category:category
            })
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
                let totalCost  = 0;
                $.each(jsonData, function(i) {
                    totalCost += jsonData[i].amount;
                    $('<tr>').html(
                        "<td class='text-center'>" + jsonData[i].cost_name + "</td>" +
                        "<td class='text-center'> " + jsonData[i].amount + " </td>" +
                        "<td class='text-center'>"+ jsonData[i].created+"</td>"
                    ).appendTo('#cost_table');
                });

                console.log(totalCost);
                $('<tr>').html(
                        "<th class='text-center'>Total</th>" +
                        "<th class='text-center'>Cost </th>" +
                        "<th class='text-center'>"+totalCost+" /=</th>"+
                        "<th class='text-center'>Only</th>"
                ).appendTo('#total_row');

            } else {

            }

        })
        .catch(function(error) {
        });

})

$('#customDate').click(function(){
   let getCustomDate =  $('#custom_date_get').val();
   $('#table_name').html(getCustomDate+" ????????????????????? ?????????");
   $('#my_toggle').html(getCustomDate)
   var category = $('#category').val();
   console.log(category);
   console.log(getCustomDate);
   $('#total_row').empty();
   $('#cost_table').empty();

   axios.post('/selectCostDatewise',{
       getCustomDate:getCustomDate,
       category:category
       })
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
                let totalCost  = 0;
                $.each(jsonData, function(i) {
                    totalCost += jsonData[i].amount;
                    $('<tr>').html(
                        
                        "<td class='text-center'>" + jsonData[i].cost_name + "</td>" +
                        "<td class='text-center'> " + jsonData[i].amount + " </td>" +
                        "<td class='text-center'>"+ jsonData[i].created+"</td>"
                    ).appendTo('#cost_table');
                });

                console.log(totalCost);
                $('<tr>').html(
                        "<th class='text-center'>Total</th>" +
                        "<th class='text-center'>Cost </th>" +
                        "<th class='text-center'>"+totalCost+" /=</th>"+
                        "<th class='text-center'>Only</th>"
                ).appendTo('#total_row');

                $('#custom_date_get').val("")

            } else {

            }

        })
        .catch(function(error) {
        });
})


$('#today').click(function(){
            $('#table_name').html("??????????????? ??????????????? ??????????????????");
            $(this).addClass('active');
            $('#thisMonth').removeClass('active');
            $('#my_toggle').html("Today")
              let today = new Date();
              let date = today.getDate();
              
              let month = today.getMonth();
              let currentM = month + 1;
              let year =today.getFullYear();
              
              
              var getCustomDate = `${year}-${currentM < 10 ?'0':''}${currentM}-${date<10 ? '0':''}${date}`
              console.log(getCustomDate);
              var category = $('#category').val(" ");
              console.log(category);
    $('#total_row').empty();
    $('#cost_table').empty();
    axios.post('/selectCostDatewise',{
        getCustomDate:getCustomDate
        })
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
                let totalCost  = 0;
                $.each(jsonData, function(i) {
                    totalCost += jsonData[i].amount;
                    $('<tr>').html(
                        
                        "<td class='text-center'>" + jsonData[i].cost_name + "</td>" +
                        "<td class='text-center'> " + jsonData[i].amount + " </td>" +
                        "<td class='text-center'>"+ jsonData[i].created+"</td>"
                    ).appendTo('#cost_table');
                });

                console.log(totalCost);
                $('<tr>').html(
                        "<th class='text-center'>Total</th>" +
                        "<th class='text-center'>Cost </th>" +
                        "<th class='text-center'>"+totalCost+" /=</th>"+
                        "<th class='text-center'>Only</th>"
                ).appendTo('#total_row');

            } else {

            }

        })
        .catch(function(error) {
        });

})

$('#submitCost').click(function() {

    var costName = $('#costName').val();
    var event = $('#eventName').val();
    var amount = $('#amount').val();

    console.log(costName+" "+amount+" "+event);

    costaddFun(costName,amount,event)
})

function costaddFun(costName,amount,event) {
	$('#submitCost').html("<div class='spinner-border text-dark' role='status'><span class='visually-hidden'></span></div>");
	axios.post('/AddCost', {
			costName: costName,
			event: event,
			amount: amount
		})
		.then(function(response){
			$('#submitCost').html("Save cost");
			if (response.status == 200) {
				if (response.data == 1) {
					$('#exampleModal').modal('hide');
                    
				    $('#cost_form')[0].reset();
					
                    Swal.fire({
                    icon: 'error',
                    title: 'Submit  Cost...',
                    text: 'Confirm this Cost?'
                  })
                  todayCostView();
                  $('#table_name').html("??????????????? ??????????????? ??????????????????");

				} else {
					$('#exampleModal').modal('hide');
				}
			} else {
				$('#exampleModal').modal('hide');
			}

		})
		.catch(function(error) {
			$('#exampleModal').modal('hide');
		});



}
// get Data for show in table

function todayCostView() {
    $(this).addClass('active');
            $('#thisMonth').removeClass('active');
            $('#my_toggle').html("Today")
              let today = new Date();
              let date = today.getDate();
              
              let month = today.getMonth();
              let currentM = month + 1;
              let year =today.getFullYear();
              
              
              var getCustomDate = `${year}-${currentM < 10 ?'0':''}${currentM}-${date<10 ? '0':''}${date}`
              var category = $('#category').val(" ");
              console.log(category);
              console.log(getCustomDate);
    $('#total_row').empty();
    $('#cost_table').empty();
    axios.post('/selectCostDatewise',{
        getCustomDate:getCustomDate
        })
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
                let totalCost  = 0;
                $.each(jsonData, function(i) {
                    totalCost += jsonData[i].amount;
                    $('<tr>').html(
                        
                        "<td class='text-center'>" + jsonData[i].cost_name + "</td>" +
                        "<td class='text-center'> " + jsonData[i].amount + " </td>" +
                        "<td class='text-center'>"+ jsonData[i].created+"</td>"
                    ).appendTo('#cost_table');
                });

                console.log(totalCost);
                
                $('#table_name').html("??????????????? ??????????????? ??????????????????");
                $('<tr>').html(
                        "<th class='text-center'>Total</th>" +
                        "<th class='text-center'>"+totalCost+" /=</th>"+
                        "<th class='text-center'>Cost </th>"
                        
                ).appendTo('#total_row');

            } else {

            }

        })
        .catch(function(error) {
        });
}
todayCostView();



</script>

@endsection
