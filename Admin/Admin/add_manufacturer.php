<?php include_once 'car_header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Manufacturer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Manufacturer Page</li>
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
                <div class="col-lg-6">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           
                                <p id="succ_msg" style="color:green;display:none;">Manufacturer added successfully!!</p>
                           
                            <form role="form" action="" method="post" id="editor-form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Manufacturer Name</label>
                                    <input id="manu_name" name ="manu_name" type="text" class="form-control" >
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
                    manu_name:{ 
                        required:true,
                        minlength:3,
                        maxlength:50
                    }
                    
                   
                },
                messages: {
                    manu_name:{ 
                        required:"Please enter manufacturer name",
                        minlength:"Manufacturer name must be at least 3 characters long",
                        maxlength:"Manufacturer name must be at most 50 characters long",
                    },
                  
                },
                submitHandler: function(form) {
                    
                    //alert('submitted');
                    $.ajax({
                    type : "POST",
                    url : "manufacturer_action.php",
                    data : $("#editor-form").serialize(),
                    beforeSend : function() {
                        
                    },
                    success : function(response) {
                        
                        if(response=='success'){
                            $('#succ_msg').show();
                             $('#manu_name').val('');
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