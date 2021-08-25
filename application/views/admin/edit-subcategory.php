<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Edit SubCategory</title>

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
              <h1 class="m-0 text-dark">Edit SubCategory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit SubCategory</li>
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
                    <a class="btn btn-success" href="<?=base_url().'admin/subcategory/index';?>"><i class="fas fa-previous"></i> Back</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open_multipart('admin/subcategory/edit/'.$subcategory['subcategory_id']);?>
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Category Name</label>
                         <select class="form-control" name="category_id" id="category_id">
                          <option value="">Choose Category</option>
                            <?php
                              foreach($allCategory as $category){
                            ?>
                            <option value="<?=$category['category_id']?>" <?php if($category['category_id']==$subcategory['category_id']){ echo "selected"; }?>><?=$category['category_name']?></option>
                            <?php
                              }
                            ?>
                         </select>
                        </div>
                        <?=form_error("category_id");?>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Category Name</label>
                          <input type="text" placeholder="Category Name" name="subcategory_name" id="subcategory_name" class="form-control" value="<?=set_value('subcategory_name',$subcategory['subcategory_name']);?>">
                        </div>
                        <?=form_error("subcategory_name");?>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Category Image</label>
                          <input type="file" name="image" id="category_image" class="form-control">
                        </div>
                      </div>
                      <?php if($subcategory['subcategory_image']!="" && file_exists('./public/uploads/subcategory/thumb/'.$subcategory['subcategory_image'])){?>
                        <img src="<?=base_url().'public/uploads/subcategory/thumb/'.$subcategory['subcategory_image']?>" alt="No image found">
                        <?php
                          }else{
                        ?>
                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-7.gif" alt="No image found">
                        <?php
                            }
                        ?>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Meta Title</label>
                          <input type="text" placeholder="Meta Title" name="meta_title" id="meta_title" class="form-control" value="<?=set_value('meta_title',$subcategory['meta_title']);?>">
                        </div>
                        <?=form_error("meta_title");?>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Meta Description</label>
                          <input type="text" placeholder="Meta Description" name="meta_description" id="meta_description" class="form-control" value="<?=set_value('meta_description',$subcategory['meta_description']);?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Status</label>
                          <select class="form-control" name="status" id="status">
                            <option value="1" <?php if($subcategory['status']==1){echo "selected";}?>>Active</option>
                            <option value="0" <?php if($subcategory['status']==0){echo "selected";}?>>Inactive</option>
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
