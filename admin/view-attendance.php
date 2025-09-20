<?php
//the isset function to check username is already loged in and stored on the session
require 'includes/global.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gymdesk Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/uniform.css" />
  <link rel="stylesheet" href="../css/select2.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
  <!--close-top-serch-->

  <!--sidebar-menu-->
  <?php $page = "attendance";
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="attendance.php" class="current">Manage Attendance</a> </div>
      <h1 class="text-center">Attendance List <i class="fas fa-calendar"></i></h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">

          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>Attendance Table</h5>
            </div>
            <div class='widget-content nopadding'>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Last Attended Date</th>
                    <th>Recorded By</th>
                  </tr>
                </thead>
                <?php

                $qry = "SELECT * FROM attendance a
                     JOIN members m ON a.user_id = m.user_id
                     ORDER BY a.check_in_time DESC";
                $result = mysqli_query($con, $qry);

                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) {

                  $sql_datetime = $row['check_in_time'];

                  // Convert the SQL date string to a Unix timestamp
                  $timestamp = strtotime($sql_datetime);

                  // Format the timestamp into a human-readable format
                  $formatted_date = date('D, M j, Y \a\t g:i A', $timestamp);

                  ?>
                  <tbody>

                    <td>
                      <div class='text-center'><?php echo $cnt; ?></div>
                    </td>
                    <td>
                      <div class='text-center'><?php echo $row['fullname']; ?></div>
                    </td>
                    <td>
                      <div class='text-center'>
                        <?php echo $formatted_date; ?>
                      </div>
                    </td>
                    <td>
                      <div class='text-center'>
                        <?php echo $row['recorded_by']; ?>
                      </div>
                    </td>
                  </tbody>
                  <?php $cnt++;
                } ?>


              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--end-main-container-part-->

  <!--Footer-part-->

  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Developed By Zeeshan</a> </div>
  </div>

  <style>
    #footer {
      color: white;
    }
  </style>

  <!--end-Footer-part-->

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>

  </script>
</body>

</html>