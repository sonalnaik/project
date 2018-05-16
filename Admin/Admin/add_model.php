<?php include_once 'car_header.php'; 
include('db_conn.php');


	

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Model</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Model Page</li>
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
                           
                            <form role="form" action="" method="post" id="editor-form">
                                <!-- text input -->
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                         <div class="col-lg-6" >
                                                <div class="form-group">
                                            <label>Model Name</label>
                                            <input name ="model_name" id ="model_name" type="text" class="form-control" >
                                        </div>
                                        </div>
                                         <div class="col-lg-6" style="margin-top: -86px; margin-left: 50%;position:absolute;">
                                               <div class="form-group">
                                                <label>Manufacturer</label>
                                                 <select class="form-control" id="manu" name="manu">
                                                <?php $get_manu="SELECT * from manufacturers where is_deleted=0";
                                                $result = $con->query($get_manu);
                                                while($data=mysqli_fetch_array($result)){ ?>
                                                        <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                                                   
                                                <?php } ?>
                                                </select>
                                </div>
                                        </div>
                                        </div>
                                           
                                         <div class="form-group">
                                            <label>Color</label>
                                            <input id ="color" name ="color" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Registration Number</label>
                                            <input id ="registration_number" name ="registration_number" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Note</label>
                                            <input id ="note" name ="note" type="text" class="form-control" >
                                        </div>
                                        
                                </div>
                                




                                
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>

                            </form>
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

</body>
</html>
<script>
    $(document).ready(function(){
     
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