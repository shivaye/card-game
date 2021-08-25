<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Manage Category</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
              <h1 class="m-0 text-dark">Manage Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage Category</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">
             <?php
             if(!empty($this->session->flashdata('error')))
             {
              echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>".$this->session->flashdata('error')."</div>";
            }
            ?>
            <?php
            if(!empty($this->session->flashdata('success')))
            {
              echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>".$this->session->flashdata('success')."</div>";
            }
            ?>
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a class="btn btn-primary" href="javascript:void(0)" onclick="show_modal1()"><i class="fas fa-eye"></i>  View All</a>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Offer Category</th>
                      <th>Offer Type</th>
                      <th>Offer Description</th>
                      <th>Offer Discount</th>
                      <th>Coupon Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="row_position">
                    <?php
                    $i=1;
                    foreach ($pakka_retailer_offer_details as $value) {
                     ?>
                     <tr>
                      <td><?=$i;?></td>
                      <td><?=$value['offer_category']?></td>
                      <td><?=$value['offer_type']?></td>
                      <td><?=$value['offer_desc']?></td>
                      <td><?=$value['offer_percentage']?></td>
                      <td><?=$value['coupon_code']?></td>
                      <td><a href="javascript:void(0)" class="btn btn-info fa fa-plus" onclick="show_modal('<?=$value['offer_id']?>','<?=$value['offer_desc']?>');"></a></td>
                    </tr>
                    <?php 
                    $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="title1">All Offers By Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Offer Category</th>
              <th>Offer Description</th>
              <th>Offer Id</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="row_position">
            <?php
            $i=1;
            foreach ($getpakka_top_coupon_category_offer as $value) {
             ?>
             <tr>
              <td><?=$i;?></td>
              <td><?=$value['category_name']?> <?=$value['id']?></td>
              <td><?=$value['offer_desc']?></td>
              <td><?=$value['offer_id']?></td>
              <td><a href="javascript:void(0)" class="btn btn-danger fa fa-trash" onclick="delete_offer('<?=$value['did']?>');"></a></td>
            </tr>
            <?php 
            $i++;
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=base_url()?>admin/category/create_coupon_category_offer" method="POST">
          <div class="col-md-12">
            <label>Select Category</label>
            <select class="form-control" name="top_coupon_cat_id">
              <?php 

              foreach($allCategory as $category)
              {
                ?>
                <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
                <?php 
              }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label>Display Order</label>
            <input type="text" name="display_order" class="form-control" id="display_order" placeholder="Display Order">
          </div>
          <div class="col-md-12">
            <label>Select Status</label>
            <select class="form-control" name="is_active">
              <option value="Y">Active</option>
              <option value="N">Inactive</option>
            </select>
          </div>
          <input type="hidden" name="offer_id" id="offer_id" value="<?=$_SERVER['REQUEST_URI'];?>">
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

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
<script src="<?=base_url()?>public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function deleteCategory(id)
  {
    if(confirm('Are You Sure Want To Delete Category'))
    {
      window.location.href='<?=base_url().'admin/category/delete/';?>'+id;
    }
  }
</script>
<script type="text/javascript">
  $( ".row_position" ).sortable({
    delay: 150,
    stop: function() {
      var selectedData = new Array();
      $('.row_position>tr').each(function() {
        selectedData.push($(this).attr("id"));
      });
      updateOrder(selectedData);
    }
  });


  function show_modal(offer_id,offer_desc) {

    $('#title').empty();
    $('#title').html(offer_desc);
    $('#offer_id').empty();
    $('#offer_id').val(offer_id);
    $('#myModal').modal('show');

  }

  function show_modal1() {
    $('#myModal1').modal('show');
  }

  function delete_offer(id)
  {
    if(confirm('Are You Sure Want To Delete Offer'))
    {
      window.location.href='<?=base_url().'admin/category/delete_offer/';?>'+id;
    }
  }
</script>
</body>
</html>
