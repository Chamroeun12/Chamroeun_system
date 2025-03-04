<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['name_search'])) {
    $sql = "SELECT * FROM tb_student WHERE En_name LIKE '%" . $_POST['name_search'] . "' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM tb_student LIMIT 10";
    if (isset($_GET['page'])) {
        if ($_GET['page'] > 1) {
            $sql .= " OFFSET " . ($_GET['page'] - 1) * 10;
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Insert Student
// if (isset($_POST['btnsave'])) {
//     if (isset($_GET['stu_id']))
//         if ($stmt->rowCount()) {
//             header('Location: student_list.php');
//             exit;
//         }
// }
//Insert Student
if (isset($_POST['btnsave'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;
    $sql = "INSERT INTO tb_student(En_name,Kh_name,DOB,Address,Level,Unit,Time,Dad_name,Mom_name,Dad_job,Mom_job,Phone,Profile_img) 
    VALUES(:En_name, :Kh_name, :DOB, :Address, :Level, :Unit, :Time, :Dad_name, :Mom_name, :Dad_job, :Mom_job, :Phone,:Profile_img)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":En_name", $_POST['en_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Kh_name", $_POST['kh_name'], PDO::PARAM_STR);
    $stmt->bindParam(":DOB", $_POST['dob'], PDO::PARAM_STR);
    $stmt->bindParam(":Address", $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam(":Level", $_POST['level'], PDO::PARAM_STR);
    $stmt->bindParam(":Unit", $_POST['unit'], PDO::PARAM_STR);
    $stmt->bindParam(":Time", $_POST['time'], PDO::PARAM_STR);
    $stmt->bindParam(":Dad_name", $_POST['dad_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Mom_name", $_POST['mom_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Dad_job", $_POST['dad_job'], PDO::PARAM_STR);
    $stmt->bindParam(":Mom_job", $_POST['mom_job'], PDO::PARAM_STR);
    $stmt->bindParam(":Phone", $_POST['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":Profile_img", $file_name, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        header('Location: student_list.php');
    }
    if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }
}



//pages
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_student";
$stmt = $conn->prepare($sql);
$stmt->execute();
$temp = $stmt->fetch(PDO::FETCH_ASSOC);

$maxpage = 1;
if ($temp) {
    $maxpage = ceil($temp['CountRecords'] / 10);
}

?>

<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h1 class="m-0">|Student Lists</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <h3 class="card-title float-sm-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                        Add
                    </button>
                </h3>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <?php if (isset($_GET['ID'])) { ?>
                        <h3 class="card-title" style="color:chocolate;">Edit Student</h3>
                    <?php } else { ?>

                        <h3 class="card-title" style="color:chocolate;">Add Student</h3>
                    <?php  } ?> -->
                    <h4>|Insert Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Condition to Add or Edit student -->

                <!-- form add and edit student -->
                <form name="studentform" method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">English Name</label>
                                    <input type="text" id="enName" name="en_name" class="form-control" value="">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Khmer Name</label>
                                        <input type="text" id="khName" name="kh_name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputStatus">Gender</label>
                                        <select id="inputStatus" name="gender" class="form-control custom-select">
                                            <option selected disabled>--Select one--</option>
                                            <option value="Male"> Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputDateOfBirth">Date Of Birth</label>
                                        <input type="date" id="inputDateOfBirth" name="dob" class="form-control"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Level</label>
                                    <input type="text" id="enName" name="level" class="form-control" value="">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Unit</label>
                                        <input type="text" id="khName" name="unit" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputTime">Time</label>
                                        <select name="time" id="" class="form-control custom-select">
                                            <option value="" selected disabled>--Select One--</option>
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                        <!-- <input type="text" id="time" name="time" class="form-control"class="form-control" value=""> -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pob">Place Of Birth</label>
                                        <input type="date" id="inputDOB" name="pob" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Dad Name</label>
                                    <input type="text" name="dad_name" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Dad Job</label>
                                    <input type="text" name="dad_job" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Mom Name</label>
                                    <input type="text" name="mom_name" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Mom Job</label>
                                    <input type="text" name="mom_job" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Address</label>
                            <textarea id="inputDescription" name="address" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPhone">Phone</label>
                                    <input type="text" id="inputPhone" name="phone" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail">Igmage</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>


                        <!-- <?php if ($_SESSION['role'] == "admin") { ?>
                        <?php if (isset($_GET['student_id'])) { ?>
                        <input type="submit" value="Delete" name="btndelete"
                            onclick="return confirm('Do you want to delete this record?')" class="btn btn-danger">
                        <?php } ?>
                        <?php } ?> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Save" name="btnsave" class="btn btn-success">
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.row -->
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                            Add
                        </button>
                    </h3> -->
                    <div class="card-tools">
                        <div class="form-group" style="width: 300px;">
                            <input type="text" id="" name="namesearch" class="search form-control float-right"
                                placeholder="Search" style="font-family:Khmer OS Siemreap;">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" style="font-family:Khmer OS Siemreap;" id="userTbl">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Image</th>
                                <th>English Name</th>
                                <th>Khmer Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <th>Student Code</th>
                                <th>Level</th>
                                <th>Shift</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php
                                        if (isset($_GET['page']) && $_GET['page'] > 1)
                                            echo ($_GET['page'] - 1) * 10 + ($key + 1);
                                        else
                                            echo ($key + 1);
                                        ?></td>
                                    <td>
                                        <div class="user-panel">
                                            <div class="image">
                                                <img onerror="this.style.display = 'none'" class="img-circle"
                                                    src="images/<?= $value['Profile_img']; ?>"
                                                    style="width: 50px; height: 50px;" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $value['En_name']; ?></td>
                                    <td><?php echo $value['Kh_name']; ?></td>
                                    <td><?php echo $value['Gender']; ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($value['DOB'])); ?></td>
                                    <td><?php echo $value['Address']; ?></td>
                                    <td><?php echo $value['Stu_code']; ?></td>
                                    <td><?php echo $value['Level']; ?></td>
                                    <td><?php echo $value['Time']; ?></td>
                                    <td><?php echo $value['Status']; ?></td>
                                    <td>
                                        <a href="update_student.php?stu_id=<?php echo $value['ID'] ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="m-2" href="all_condition.php?stu_id=<?php echo $value['ID'] ?>"
                                            onclick="return confirm('Do you want to delete this record?')">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                        <a href="">
                                            <i class="nav-icon fas fa-ellipsis-h"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="student_list.php?page=
                     <?php
                        if (isset($_GET['page']) && $_GET['page'] > 1)

                            echo $_GET['page'] - 1;
                        else
                            echo 1;
                        ?>
                    ">&laquo;</a></li>
                            <?php for ($i = 1; $i <= $maxpage; $i++) { ?>
                                <li class="page-item
                      <?php
                                if (isset($_GET['page'])) {
                                    if ($i == $_GET['page'])
                                        echo ' active ';
                                } else {
                                    if ($i == 1)
                                        echo ' active ';
                                }
                        ?>"><a class="page-link" href="student_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="student_list.php?page=
                     <?php
                        if (isset($_GET['page'])) {
                            if ($_GET['page'] == $maxpage) {
                                echo $maxpage;
                            } else {
                                echo $maxpage + 1;
                            }
                        } else {
                            echo 2;
                        }
                        ?>">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</section>
</div>
<?php include_once "footer.php"; ?>