<?php include_once 'car_header.php'; 

require 'db_conn.php';



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Inventory Page</h1>
                     <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Inventory Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-8">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           
                                <p id="succ_msg" style="color:green;display:none;">Model added successfully!!</p>
                           <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                 <th>Sr. No.</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Count</th>
                
            </tr>
        </thead>
        <tbody>
             <?php  $get_manu="SELECT manufacturers.name as manu_name,models.*,count(models.id) as count from manufacturers inner join models on manufacturers.id= models.manu_id where manufacturers.is_deleted=0 AND models.delete_status=0 group by(models.name) order by manufacturers.id";
                                                $result = $con->query($get_manu);
                                                 // $res=$con->query($query);
                                                $i=1;
                                                while($data=mysqli_fetch_array($result)){ ?>
                                                        <tr class="dyn_row" id="<?php echo $data['name']; ?>">
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $data['manu_name']; ?></td>
                                                            <td><?php echo $data['name']; ?></td>
                                                            <td><?php echo $data['count']; ?></td>
                                                            
                                                        </tr>
                                                   
                                                <?php $i++; } ?>
           
            </tbody>
            </table>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div> 
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->


  <!-- Modal -->
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
        </div>
        <div class="modal-body">
          <p>Model Name: <span id="model_na">hj</span></p>
          <p>color: <span id="model_co">jhh</span></p>
          <p>Registration No.: <span id="model_reg">jk</span></p>
          <p>note: <span id="model_no">kj</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id= "delete" type="button" class="btn btn-default" data-dismiss="modal">Delete</button>
        </div>
      </div>
      
    </div>
  </div>
</body>


</html>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function(){
        $(document).ready(function() {
            $('#example').DataTable();
            
            $('.dyn_row').on('click',function(){
                
                 $.ajax({
                    type : "POST",
                    url : "model_detail.php",
                    data : {id:$(this).attr('id')},
                    beforeSend : function() {
                        
                    },
                    success : function(response) {
                        response1=JSON.parse(response);
                         
                             $('#model_na').html(response1.name);
                             $('#model_co').html(response1.color);
                             $('#model_reg').html(response1.regi_no);
                             $('#model_no').html(response1.note);
                             $('#delete').val(response1.name);
                            
                             $('#myModal').modal('show');
                        }
                        
                    
                });
               
            });
            
            $('#delete').on('click',function(){
                 $.ajax({
                    type : "POST",
                    url : "model_delete.php",
                    data : {id:$(this).attr('value')},
                    beforeSend : function() {
                        
                    },
                    success : function(response) {
                        location.reload();
                         
                
                        }
                        
                    
                });
            });
        } );
     
    });
    
    
</script>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#editor-form").validate({
                rules: {
                    model_name:{ 
                        required:true,
                        minlength:3,
                        maxlength:50
                    },
                    manu:{ 
                        required:true,
                    },
                    color:{ 
                        required:true,
                        minlength:3,
                        maxlength:20
                    },
                    registration_number:{
                         required:true,
                        minlength:3,
                        maxlength:20
                    },
                    note:{
                         required:true,
                        minlength:3,
                        maxlength:100
                    }
                   
                },
                messages: {
                    model_name:{ 
                        required:"Please enter model name",
                        minlength:"model name must be at least 3 characters long",
                        maxlength:"model name must be at most 50 characters long",
                    },
                   manu:{ 
                        required:"Please select manufacture.",
                    },
                    color:{ 
                        required:"Please enter manufacturer",
                        minlength:"color name must be at least 3 characters long",
                        maxlength:"color name must be at most 20 characters long",
                    },
                    registration_number:{
                         required:"Please enter regi.no.",
                        minlength:"regi. no. name must be at least 3 characters long",
                        maxlength:"regi. no. must be at most 50 characters long",
                    },
                    note:{
                        required:"Please enter note",
                        minlength:"note must be at least 3 characters long",
                        maxlength:"note must be at most 100 characters long",
                    }
                },
                submitHandler: function(form) {
                    
                    //alert('submitted');
                    $.ajax({
                    type : "POST",
                    url : "model_action.php",
                    data : $("#editor-form").serialize(),
                    beforeSend : function() {
                        
                    },
                    success : function(response) {
                        
                        if(response=='success'){
                            $('#succ_msg').show();
                            
                             $('#model_name').val('');
                             $('#manu').val('');
                             $('#color').val('');
                             $('#registration_number').val('');
                             $('#note').val('');
                        }
                        
                    }
                });
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
<style>
    .error{
        color:red;
        font-weight: normal !important;
    }
    </style>