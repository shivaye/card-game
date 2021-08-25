<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Create Colour</title>

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
              <h1 class="m-0 text-dark">Create Colour</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Create Colour</li>
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
                    <a class="btn btn-success" href="<?=base_url().'admin/colour/index';?>"><i class="fas fa-eye"></i> Manage</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open_multipart('admin/colour/create');?>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Colour Title</label>
                          <input type="text" placeholder="Colour Title" name="color_title" id="color_title" class="form-control <?php echo (form_error("color_title")!="")? 'is-invalid':''; ?>" value="<?=set_value('color_title');?>">
                        </div>
                        <?=form_error("color_title");?>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Colour Code</label>
                          <input type="color" placeholder="Colour Code" name="color_code" id="color_code" class="form-control <?php echo (form_error("color_code")!="")? 'is-invalid':''; ?>" value="<?=set_value('color_code');?>">
                        </div>
                        <?=form_error("color_code");?>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Colour Image</label>
                          <input type="file" placeholder="Colour Image" name="image" id="image" class="form-control">
                        </div>
                        <?=form_error("image");?>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Status</label>
                          <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
