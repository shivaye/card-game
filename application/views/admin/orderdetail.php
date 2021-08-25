<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=SITENAME;?> | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <?php $this->load->view('admin/header');?>
    <!-- Main Sidebar Container -->
    <!-- Main Sidebar Container -->
    <?php $this->load->view('admin/sidebar');?>
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Invoice</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url()?>admin/home">Home</a></li>
                <li class="breadcrumb-item active">Invoice</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice.
              </div>
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Rhc2.
                      <small class="float-right">Date: <?=date('d/m/Y');?></small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>Rhc2.com</strong><br>
                      Jazz Inc K-5/27A Ground Floor<br>
                      Nit 5 Faridabad Haryana 121001<br>
                      Phone: 8585-90-4242<br>
                      Email: care@Rhc2.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    To
                    <address>
                      <strong><?=$order_detail['name'];?></strong><br>
                      <?=$order_detail['address'];?><br>
                      <?=$order_detail['state'];?>, <?=$order_detail['city'];?> <?=$order_detail['zip_code'];?><br>
                      Phone: <?=$order_detail['phone'];?><br>
                      Email: <?=$order_detail['email'];?>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?=$order_detail['trx_id'];?></b><br>
                    <br>
                    <b>Order ID:</b> <?=$order_detail['id'];?><br>
                    <b>Payment Method:</b> <?=$order_detail['payment_method'];?><br>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                          <th>Mrp</th>
                          <th>Price</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=1;
                        foreach($order_items as $value)
                        {
                          $subtotal[] = $value['price'];
                          ?>
                        <tr>
                          <td><?=$i;?></td>
                          <td><img src="<?=base_url()?>public/uploads/products/<?=$value['product_id']?>/thumb/<?=$value['product_image']?>" alt="Product" style="height:100px;"></td>
                          <td><?=$value['product_name']?></td>
                          <td><?=$value['quantity']?></td>
                          <td>$<?=$value['mrp']?></td>
                          <td>$<?=$value['price']?></td>
                          <td>$<?=$value['sub_total']?></td>
                        </tr>
                        <?php
                        $i++;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<?=array_sum($subtotal)?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <?php 
                          if(array_sum($subtotal)<65)
                          {
                            $shipping = "6.99";
                          }else{
                            $shipping = "0.00";
                          }
                        ?>
                        <td>$<?=$shipping;?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<?=$order_detail['grand_total'];?></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="javascript:void(0)" onclick="window.print();" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button> -->
                      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" href="javascript:void(0)" onclick="window.print();">
                        <i class="fas fa-download"></i> Generate PDF
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Main Sidebar Container -->
      <?php $this->load->view('admin/footer');?>
      <!-- Main Sidebar Container -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="<?=base_url()?>public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>public/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>public/admin/dist/js/demo.js"></script>
  </body>
  </html>