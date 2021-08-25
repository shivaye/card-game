<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('admin/header');?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('admin/sidebar');?>
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <!-- <div class="row">
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-red" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Category
                  </div>
                </div>
                <h1 class="text-center"><?=$output['category']?></h1>
                <h3 class="text-center">Category</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-orange" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Subcategory
                  </div>
                </div>
                <h1 class="text-center"><?=$output['subcategory']?></h1>
                <h3 class="text-center">Subcategory</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-yellow" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Brands
                  </div>
                </div>
                <h1 class="text-center"><?=$output['brands']?></h1>
                <h3 class="text-center">Brands</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-green" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Members
                  </div>
                </div>
                <h1 class="text-center"><?=$output['members']?></h1>
                <h3 class="text-center">Members</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-purple" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Orders
                  </div>
                </div>
                <h1 class="text-center"><?=$output['total_orders']?></h1>
                <h3 class="text-center">Total Orders</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-green" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    New Orders
                  </div>
                </div>
                <h1 class="text-center"><?=$output['new_orders']?></h1>
                <h3 class="text-center">New Orders</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-red" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Orders
                  </div>
                </div>
                <h1 class="text-center"><?=$output['completed_orders']?></h1>
                <h3 class="text-center">Comp. Orders</h3>
              </div>
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <div class="position-relative p-3 bg-orange" style="height: 120px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Orders
                  </div>
                </div>
                <h1 class="text-center"><?=$output['rejected_orders']?></h1>
                <h3 class="text-center">Reject. Orders</h3>
              </div>
            </div>
          </div> -->
          <div class="row">
            <div class="col-sm-12" style="margin-top: 10px; margin-bottom: 10px;">
              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <?php $this->load->view('admin/footer');?>
    <!-- Main Footer -->
  </div>

  <!-- jQuery -->
  <script src="<?=base_url()?>public/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url()?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    window.onload = function () {

      var options = {
        animationEnabled: true,
        title: {
          text: "Sales Report"
        },
        data: [{
          type: "doughnut",
          innerRadius: "70%",
          showInLegend: true,
          legendText: "{label}",
          indexLabel: "{label}: #percent%",
          dataPoints: [
          { label: "Total Sale", y: 2000 },
          { label: "Total Refund", y: 100 },
          ]
        }]
      };
      $("#chartContainer").CanvasJSChart(options);

    }
  </script>
  <!-- AdminLTE App -->
  <script src="<?=base_url()?>public/admin/dist/js/adminlte.min.js"></script>
  <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
  <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
