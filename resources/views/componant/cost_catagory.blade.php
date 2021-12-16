@extends('layout.master')
@section('content')
<div class="row">
     <div class="col-12">
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">New catagory</button>

        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"           
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Catagory Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="cost_form">
                        <div class="form-group">
                            <label for="">Catagory Name</label>
                            <input type="text" id="cat_name"  class="form-control">
                          </div>

                        </form>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="submit_cat" class="btn btn-sm btn-primary">save catagory</button>
                    </div>
                    </div>
                </div>
            </div>
        <!--Modal End-->
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
                                            <th class='text-center'>Id</th>
                                            <th class='text-center'>Catagory</th>
                                            <th class='text-center'>del</th>
                                            <th class='text-center'>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="catagory_table">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
        
        
        <!--End Table-->


           
    


@endsection

@section('script')

<script>
// get Catagory for show in table

function getCatagory() {
           
    axios.get('/selectCostCatagory')
        .then(function(response) {

            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);
              
                $.each(jsonData, function(i) {
                    
                    $('<tr>').html(
                        "<td class='text-center'>" + jsonData[i].id + "</td>" +
                        "<td class='text-center'>" + jsonData[i].event_name + "</td>" +
                        "<td class='text-center'> <a class='EditeService' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>"+
                        "<td class='text-center'> <a class='EditeService' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>"
                    ).appendTo('#catagory_table');
                });

               

            } else {

            }

        })
        .catch(function(error) {
        });
}
getCatagory();

$('#submit_cat').click(function() {

    var catName = $('#cat_name').val();

    console.log(catName);

    catagoryAddFun(catName)
})

function catagoryAddFun(catName) {
	$('#submit_cat').html("<div class='spinner-border text-dark' role='status'><span class='visually-hidden'></span></div>");

    $('#catagory_table').empty();
	axios.post('/AddCatagory', {
			event_name: catName,
		})
		.then(function(response){
			$('#submit_cat').html("save catagory");
			if (response.status == 200) {
				if (response.data == 1) {
					$('#exampleModal').modal('hide');
                    
				    $('#cost_form')[0].reset();
					
                    Swal.fire({
                    icon: 'error',
                    title: 'Submit  Cost...',
                    text: 'Confirm this Cost?'
                  })
                  getCatagory();

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
</script>

@endsection
