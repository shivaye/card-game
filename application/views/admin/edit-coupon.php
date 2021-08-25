<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Edit Coupon</title>

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
              <h1 class="m-0 text-dark">Edit Coupon</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Coupon</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <?php
                if(!empty($this->session->flashdata('msg')))
                {
                  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>".$this->session->flashdata('msg')."</div>";
                }
                ?>
                 <?php
                if(!empty($this->session->flashdata('success')))
                {
                  echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>".$this->session->flashdata('success')."</div>";
                }
                ?>
              <!-- jquery validation -->
              <div class="card card-info">
                <div class="card-header">
                  <div class="card-tools">
                    <a class="btn btn-success" href="<?=base_url().'admin/coupon/index';?>"><i class="fas fa-previous"></i> Back</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open_multipart('admin/coupon/edit/'.$category['coupon_id']);?>
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Coupon Code</label>
                        <input type="text" placeholder="Coupon Code" name="coupon_code" id="coupon_code" class="form-control" value="<?=set_value('coupon_code',$category['coupon_code']);?>">
                      </div>
                      <?=form_error("coupon_code");?>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Start Date</label>
                        <input type="date" placeholder="Start Date" name="start_date" id="start_date" class="form-control" value="<?=set_value('start_date',$category['start_date']);?>">
                      </div>
                      <?=form_error("start_date");?>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">End Date</label>
                        <input type="date" placeholder="End Date" name="end_date" id="end_date" class="form-control" value="<?=set_value('end_date',$category['end_date']);?>">
                      </div>
                      <?=form_error("end_date");?>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Discount Type</label>
                        <select class="form-control" name="discount_type" id="discount_type">
                          <option value="1" <?php if($category['discount_type']==1){echo "selected";}?>>Percentage</option>
                          <option value="0" <?php if($category['discount_type']==0){echo "selected";}?>>Flat</option>
                        </select>
                      </div>
                    </div>
                    <?php
                      if($category['discount_type']==1){
                    ?>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Discount (%)</label>
                        <input type="text" placeholder="Discount" name="amount" id="amount" class="form-control" value="<?=$category['percentage']?>">
                      </div>
                      <?=form_error("amount");?>
                    </div>
                    <?php
                      }else{
                    ?>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Discount (Flat)</label>
                        <input type="text" placeholder="Discount" name="amount" id="amount" class="form-control" value="<?=$category['flat_amount']?>">
                      </div>
                      <?=form_error("amount");?>
                    </div>
                    <?php
                      }
                    ?>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputName">Status</label>
                        <select class="form-control" name="status" id="status">
                          <option value="1" <?php if($category['status']==1){echo "selected";}?>>Active</option>
                          <option value="0" <?php if($category['status']==0){echo "selected";}?>>Inactive</option>
                        </select>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
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
  <!-- AdminLTE App -->
  <script src="<?=base_url()?>public/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
