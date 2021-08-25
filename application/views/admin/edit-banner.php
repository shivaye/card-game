<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Edit Banner</title>

  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/summernote/summernote-bs4.css">
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
              <h1 class="m-0 text-dark">Edit Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Banner</li>
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
                    <a class="btn btn-success" href="<?=base_url().'admin/banner/index';?>"><i class="fas fa-previous"></i> Back</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open_multipart('admin/banner/edit/'.$category['banner_id']);?>
                  <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Banner Image</label>
                          <input type="file" name="image" id="category_image" class="form-control">
                          <?php echo (!empty($errorImageUpload)) ?$errorImageUpload:''; ?>
                        </div>
                      </div>
                      <?php if($category['image']!="" && file_exists('./public/uploads/banner/thumb/'.$category['image'])){?>
                        <img src="<?=base_url().'public/uploads/banner/thumb/'.$category['image']?>" alt="No image found">
                        <?php
                          }else{
                        ?>
                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-7.gif" alt="No image found">
                        <?php
                            }
                        ?>
                        <div class="col-md-4">
                        <div class="form-group">
                          <?php $days_name = json_decode($category['day_name'],true);
                          ?>
                          <label for="inputName">Days Name</label>
                         <select class="select2 form-control" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="day_name[]">
                          <option value="">Choose Days</option>
                          <?php
                            $headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
                            foreach($headings as $days){
                          ?>
                           <option value="<?=$days?>" <?php if(in_array($days,$days_name)){ echo "selected";}?>><?=$days?></option>
                           <?php
                              }
                           ?>
                         </select>
                        </div>
                      </div>
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


  <script src="<?=base_url()?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>public/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/admin/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
</body>
</html>
