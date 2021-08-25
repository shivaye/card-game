<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITENAME;?> | Play</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/select2/css/select2.min.css">
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
              <h1 class="m-0 text-dark">Play</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Play</li>
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
                <!-- /.card-header -->
                <!-- form start -->
                <?=form_open_multipart('admin/card/index');?>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Enter Cards</label>
                         <select class="select2 form-control" multiple="multiple" data-placeholder="Select a Power Type" style="width: 100%;" name="cards[]">
                          <?php 
                          foreach($getAllCards as $cards) {
                          ?>
                           <option value="<?=$cards['card_id']?>"><?=$cards['card_name']?><?=$cards['shape']?></option>
                          <?php }?>
                         </select>
                        </div>
                        <?=form_error("card_number");?>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="play" value="yes">
                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

                <center><h3>Game Result</h3></center>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Player</th>
                      <th>Win Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                      foreach(@$score_card as $card){
                    ?>
                    <tr>
                      <td><?=$i;?></td>
                      <?php 
                        if($card['winner_palyer']=="p1")
                        {
                      ?>
                      <td>You</td>
                      <?php
                      }else{
                    ?>
                    <td>Player <?=$card['winner_palyer']?></td>
                    <?php 
                      }
                    ?>
                      <td><?=$card['wincount']?></td>
                    </tr>
                    <?php
                    $i++;
                      }
                    ?>
                  </tbody>
                </table>
               </div>
               <center><h3>Game Steps Result</h3></center>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>You</th>
                      <th>P2</th>
                      <th>P3</th>
                      <th>P4</th>
                      <th>Winner</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                      foreach(@$gamesturn as $turn){
                    ?>
                    <tr>
                      <td><?=$i;?></td>
                      <td><?=$turn['p1']?></td>
                      <td><?=$turn['p2']?></td>
                      <td><?=$turn['p3']?></td>
                      <td><?=$turn['p4']?></td>
                      <td><?=$turn[$turn['winner_palyer']]?> (<?=$turn['winner_palyer']?>)</td>
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
  <script src="<?=base_url()?>public/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
</body>
</html>
