@extends('layout.master')
@section('content')
<div class="row mb-4">
     <div class="col-12">
        <!-- Button trigger modal -->
            <button type="button" class="btn-sm btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">ধার দেওয়া</button>

        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"           
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lending Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="cost_form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" id="costName"  class="form-control">
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
    
</div>
        <input id="permitId" type="hidden" value="{{session('password')}}">
        <!--Start lending Card-->
        <div id="lending_div" class="mt-4 col-xl-3 col-md-6">
                            
        </div>
        <div class="row mt-4">
            <button id="totalBtn" class="btn btn-info btn-block btn-sm"></button>
        </div>
        <!-- End lengin Card-->
        <!--Start EditModal-->
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog"           
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lending Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="lending_pay">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" id="person_name"  class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" id="lending_amount"  class="form-control">
                            <input type="hidden" id="payid">
                          </div>
                          <div class="form-group">
                            <label for="">Pay amount</label>
                            <input type="number" id="payAmount"  class="form-control">
                          </div>
                        </form>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="payedLendingBtn" class="btn btn-sm btn-primary">Pay</button>
                    </div>
                    </div>
                </div>
            </div>
        <!--End EditModal-->


           
    


@endsection

@section('script')

<script>
$(document).on("click","#payedLendingBtn", function(){
    let permitId = $('#permitId').val();
    if(permitId != ''){
    let payid = $('#payid').val();
    let name = $('#person_name').val();
    let oldAmount = $('#lending_amount').val()
    let payAmount = $('#payAmount').val();
    let updateAmount = oldAmount - payAmount;
    console.log(updateAmount);
    console.log(payid);

    if(updateAmount < 0){
        Swal.fire({
                    icon: 'error',
                    title: 'Submit',
                    text: 'ঋণ গ্রহণযোগ্য নয়'
                  })

        }else{
            

            axios.post('/payLending',{
                payid:payid,
                updateAmount:updateAmount
                })
            .then(function(response){
                if(response.status==200){
                    $('#EditModal').modal('hide');
                    $('#lending_pay')[0].reset();
                    Swal.fire({
                            icon: 'error',
                            title: 'Submit',
                            text: 'পরিশোধ করা হয়েছে'
                        })
                    todayCostView();
                }
            })
            .catch(function(error){

            })

            }      
        }else{
            Swal.fire({
                        icon: 'error',
                        title: 'Submit',
                        text: 'Not Allowed'
                    })
        }
    
    
})

$('#submitCost').click(function() {

    let permitId = $('#permitId').val()
    if(permitId!=''){
        var costName = $('#costName').val();
        var amount = $('#amount').val();

        console.log(costName+" "+amount);

        costaddFun(costName,amount)
    }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Submit',
                    text: 'Not Allowed'
                  })
    }
    
})

function costaddFun(costName,amount) {
	$('#submitCost').html("<div class='spinner-border text-dark' role='status'><span class='visually-hidden'></span></div>");
	axios.post('/AddLending', {
			costName: costName,
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
                    title: 'Submit',
                    text: 'ঋণ দেওয়া হয়েছে'
                  })
                  todayCostView();
                  

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
    
    $('#lending_div').empty();
    
    axios.get('/selectLending')
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
                let totalCost  = 0;
               
                //new div show here
                $.each(jsonData, function(i) {
                    totalCost += jsonData[i].amount;
                    $("<div class='mt-4'>").html(
                            "<div class='card border-left-warning shadow h-100 py-2'>"+
                                "<div class='card-body'>"+
                                    "<div class='row no-gutters align-items-center'>"+
                                        "<div class='col mr-2'>"+
                                            "<div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>"+ jsonData[i].name +"</div>"+
                                            "<div class='h5 mb-0 font-weight-bold text-gray-800'>" + jsonData[i].amount + "</div>"+
                                        "</div>"+
                                        "<div class='col-auto'>"+
                                            "<button id='edit_lending' edit_id ="+jsonData[i].id+" class='btn btn-sm'><i class='fab fa-cc-amazon-pay fa-2x text-info'></i></button>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"
                    ).appendTo('#lending_div');
                   $("#totalBtn").html(totalCost);

                });

            } else {

            }

        })
        .catch(function(error) {
        });
}
todayCostView();

$(document).on("click", "#edit_lending", function(){
    
    let editId = $(this).attr('edit_id');
    axios.post('/lending_single_row_catch',{editid:editId})
    .then(function(response){
        if(response.status==200){
            $('#EditModal').modal('show');
            let getData = response.data;
            console.log(getData);
            $('#person_name').val(getData[0].name);
            $('#lending_amount').val(getData[0].amount);
            $('#payid').val(getData[0].id);
            
        }else{

        }
    })
    .catch(function(error){

    })
})


</script>

@endsection
