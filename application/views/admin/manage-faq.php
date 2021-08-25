<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Manage Faq</title>

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
              <h1 class="m-0 text-dark">Manage Faq</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage Faq</li>
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
                  <a class="btn btn-primary" href="<?=base_url().'admin/faq/create';?>"><i class="fas fa-plus"></i> Create</a>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="row_position">
                    <?php
                    $i=1;
                      foreach($getAllfaq as $faq_row){
                    ?>
                    <tr id="<?=$faq_row['faq_id'];?>">
                      <td><?=$i;?></td>
                      <td><?=$faq_row['question']?></td>
                      <td><?=$faq_row['answer']?></td>
                      <td><a href="<?=base_url().'admin/faq/edit/'.$faq_row['faq_id']?>" class="btn btn-info fa fa-edit"></a>  <a href="javascript:void(0)" onclick="deletePrize('<?=$faq_row['faq_id']?>')" class="btn btn-danger fa fa-trash"></a></td>
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

  function deletePrize(id)
  {
    if(confirm('Are You Sure Want To Delete Faq'))
    {
      window.location.href='<?=base_url().'admin/faq/delete/';?>'+id;
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


    function updateOrder(data) {
        $.ajax({
            url:"<?=base_url()?>admin/faq/sortable",
            type:'post',
            data:{position:data},
            success:function(){
                alert('your change successfully saved');
            }
        })
    }
</script>
</body>
</html>
