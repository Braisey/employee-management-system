<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
    $eid=$_SESSION['uid'];
      $emp1name=$_POST['emp1name'];
    $emp1des=$_POST['emp1des'];
    $emp1ctc=$_POST['emp1ctc'];
    $emp1wd=$_POST['emp1workduration'];
    $emp2name=$_POST['emp2name'];
    $emp2des=$_POST['emp2des'];
    $emp2ctc=$_POST['emp2ctc'];
    $emp2wd=$_POST['emp2workduration'];
    $emp3name=$_POST['emp3name'];
    $emp3des=$_POST['emp3des'];
    $emp3ctc=$_POST['emp3ctc'];
    $emp3wd=$_POST['emp3workduration'];
    
     $query=mysqli_query($con, "insert into empexpireince ( EmpID,Employer1Name, Employer1Designation, Employer1CTC,  Employer1WorkDuration, Employer2Name,  Employer2Designation, Employer2CTC, Employer2WorkDuration, Employer3Name, Employer3Designation, Employer3CTC, Employer3WorkDuration) value('$eid','$emp1name', '$emp1des', '$emp1ctc', '$emp1wd', '$emp2name', '$emp2des', '$emp2ctc', '$emp2wd', '$emp3name', '$emp3des', '$emp3ctc', '$emp3wd' )");
    if ($query) {
    $msg="Your Expirence data has been submitted succeesfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Employees Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

 <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>S no.</th>
  <th>Emp Code</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Contact no</th>
  <th>Joining Date</th>
  <th>Action</th>
  
</tr>

<?php
$ret=mysqli_query($con,"select * from employeedetail");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<tr>
  <td><?php echo $cnt;?></td>
  <td><?php  echo $row['EmpCode'];?></td>
   <td><?php echo $row['EmpFname'];?></td>
    <td><?php echo $row['EmpLName'];?></td>
  <td><?php echo $row['EmpEmail'];?></td>
  <td><?php echo $row['EmpContactNo'];?></td>
  <td><?php echo $row['EmpJoingdate'];?></td>
<!--   <td><a href="editempprofile.php?editid=<?php echo $row['ID'];?>">Edit Profile Details</a> | 
   <a href="editempeducation.php?editid=<?php echo $row['ID'];?>">Edit Education Details</a> |
    <a href="editempexp.php?editid=<?php echo $row['ID'];?>">Edit Experience Details</a>
  </td> -->
<td>
    <form method="GET" action="editempprofile.php">
        <input type="hidden" name="editid" value="<?php echo $row['ID']; ?>">
        <button style="display: inline-block; padding: 5px 10px; font-size: 14px; border: none; background: none;" type="submit">
            <i class="fas fa-user-edit" style="margin-right: 5px;"></i>
        </button>
    </form>

    <form method="GET" action="editempeducation.php">
        <input type="hidden" name="editid" value="<?php echo $row['ID']; ?>">
        <button style="display: inline-block; padding: 5px 10px; font-size: 14px; border: none; background: none;" type="submit">
            <i class="fas fa-graduation-cap" style="margin-right: 5px;"></i>
        </button>
    </form>

    <form method="GET" action="editempexp.php">
        <input type="hidden" name="editid" value="<?php echo $row['ID']; ?>">
        <button style="display: inline-block; padding: 5px 10px; font-size: 14px; border: none; background: none;" type="submit">
            <i class="fas fa-briefcase" style="margin-right: 5px;"></i>
        </button>
    </form>

<form method="GET" action="confirm_delete.php">
    <input type="hidden" name="EmpCode" value="<?php echo $row['ID']; ?>">
    <button type="submit" name="confirm_delete">Delete</button>
</form>
</td>

</tr>

<?php 
$cnt=$cnt+1;
}?>

</table>

</div>






        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>


</body>

</html>
<?php }  ?>
