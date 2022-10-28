<?php include_once("header.php"); ?>

<head>
    <title>View Customer</title>
</head>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tbl_options ORDER BY option_id ASC");

$options_result = mysqli_query($mysqli, "SELECT * FROM tbl_corps_options tco JOIN tbl_corps tc ON tco.corps_id = tc.corps_id JOIN tbl_options topt ON topt.option_id = tco.option_id WHERE tco.corps_id = $id");
$num_of_options = mysqli_num_rows($options_result);

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <a href="index.php" class="btn btn-primary mt-2 mb-4">View Customers List</a>

                <h3 class="text-primary">Add a new customer hardware record</h3>
                <form method="post" name="add_form">
                    <div class="form-group mb-2">
                        <label for="beverage">Choose an option :</label>
                        <select class="form-control" name="option_id" id="option_id" required>
                        <option value="">Select an option</option>
                            <?php
                                while($res = mysqli_fetch_array($result)){
                            ?>
                                  <option value="<?php echo $res['option_id']  ?>" ><?php echo $res['option_name']  ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group hidden">
                        <input type="hidden" name="corps_id" value=<?= $_GET['id'] ?>></td>
                    </div>
                    <button type="button" class="btn btn-primary" id="add_button" value="Update">Add new hardware option</button>
                </form>
            </div>
        </div>

         <hr>

        <div class="row">
            <h3>View Customer's HardWare List</h3>
            <table class="table table-striped mt-4">
                <tr bgcolor='#CCCCCC'>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>HardWare Name</th>
                    <th>HardWare Description</th>
                </tr>
                <?php
                    if($num_of_options > 0){
                        $iterator = 0;
                        while($res = mysqli_fetch_array($options_result)) {
                            echo "<tr>";
                            echo "<td>".++$iterator."</td>";
                            echo "<td>".$res['corps_name']."</td>";
                            echo "<td>".$res['option_name']."</td>";
                            echo "<td>".$res['option_description']."</td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "<tr>";
                        echo "<td colspan='4' class='text-center text-danger'><b>No Record Found For This Customer</b></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </row>


    </div>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">

     $(document).ready(function(){
        $('#add_button').on('click', function (e) {
           var val = $("#option_id :selected").val();
            if(val == ""){
                alert('Please Select an Option');
            }
            else{
                $.ajax({
                    type: 'post',
                    url: 'functions.php',
                    data: $('form').serialize(),
                    success: function () {
                        alert('record was saved');
                        window.location.reload();
                    }
                });
            }
        });
     });

    </script>
<?php include_once("footer.php"); ?>