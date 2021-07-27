<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <!-- Student Add Modal-->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="studentModalLabel">Student Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="code.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="">Class</label>
                    <input type="text" name="class" class="form-control" placeholder="Enter Class">
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <input type="text" name="section" class="form-control" placeholder="Enter Section">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save_student" class="btn btn-primary">Save changes</button>
            </div>
        </form>

        </div>
    </div>
    </div>
    <!-- End Student Add Modal -->

    <!-- Student VIEW Modal  -->
    <div class="modal fade" id="studentVIEWModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Student View Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="student_viewing_data">

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <!-- End VIEW Modal -->

    <!-- Student Edit Modal  -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editStudentModalLabel">Student Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="code.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="fname" id="edit_fname" class="form-control" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" id="edit_lname" class="form-control" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="">Class</label>
                    <input type="text" name="class" id="edit_class" class="form-control" placeholder="Enter Class">
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <input type="text" name="section" id="edit_section" class="form-control" placeholder="Enter Section">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="update_student" class="btn btn-primary">Update</button>
            </div>
        </form>

        </div>
    </div>
    </div>
    <!-- End Student Edit Modal  -->

    <!-- Student DELETE Modal  -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteStudentModalLabel">Student Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="student_id" id="delete_id">
                <h4>Are you sure, you want to delete this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="delete_student" class="btn btn-danger">Yes.! Delete</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- End DELETE Modal -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php 
                        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php 
                            unset($_SESSION['status']);
                        }
                    ?>
                   <div class="card-header">
                   <h5>PHP CRUD Bootstrap Model (POP UP)</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#studentModal">
                        Add Student
                    </button>
                   </div> 
                   <div class="card-body">
                   <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Section</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $conn = mysqli_connect("localhost","root","","php-crud-model");
                            $query = "SELECT * FROM students";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                while($row = mysqli_fetch_array($query_run)){
                                    ?>
                                    <tr>
                                        <td class="stud_id"><?php echo $row['id'];?></td>
                                        <td><?php echo $row['fname'];?></td>
                                        <td><?php echo $row['lname'];?></td>
                                        <td><?php echo $row['class'];?></td>
                                        <td><?php echo $row['section'];?></td>
                                        <td>
                                            <a href="#" class="badge badge-primary view_btn">VIEW</a>
                                            <a href="" class="badge badge-info edit_btn">EDIT</a>
                                            <a href="" class="badge badge-danger delete_btn">DELETE</a>
                                        </td>
                                    </tr>
                                    <?php 
                                }
                            }else{
                                echo "<h5>No Record Found</h5>";
                            }
                        ?>
                        </tbody>
                        </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            // delete 
            $('.delete_btn').click(function (e) { 
                e.preventDefault();
                var stud_id = $(this).closest('tr').find('.stud_id').text();
                // console.log(stud_id);
                $('#delete_id').val(stud_id);
                $('#deleteStudentModal').modal('show');
                
            });
            // edit 
            $('.edit_btn').click(function (e) { 
                e.preventDefault();
                var stud_id = $(this).closest('tr').find('.stud_id').text();
                // console.log(stud_id);
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'Checking_edit_btn': true,
                        'student_id': stud_id,
                    },
                    success: function (response) {
                        // console.log(response);
                        $.each(response, function (key, value) { 
                            // console.log(value['fname']);
                            $('#edit_id').val(value['id']);
                            $('#edit_fname').val(value['fname']);
                            $('#edit_lname').val(value['lname']);
                            $('#edit_class').val(value['class']);
                            $('#edit_section').val(value['section']);
                        });
                        $('#editStudentModal').modal('show');
                    }
                });

            });

            // view 
            $('.view_btn').click(function (e) { 
                e.preventDefault();
                var stud_id = $(this).closest('tr').find('.stud_id').text();
                
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'Checking_viewbtn': true,
                        'student_id': stud_id,
                    },
                    success: function (response) {
                        // console.log(response);
                        $('.student_viewing_data').html(response);
                        $('#studentVIEWModal').modal('show');
                    }
                });

            });
        });
    </script>
  </body>
</html>