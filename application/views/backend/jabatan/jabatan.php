<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Jabatan</div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <?= validation_errors() ?>
                    <div class="card-body">
                        <form action="<?= base_url('jabatan/add_jabatan')?>" method="POST">
                            <div class="form-group">
                                <label for=""> Jabatan </label>
                                <input type="text" name="nama_jabatan" class="form-control">
                            </div>

                            <button type="sumbit" class="btn btn-primary btn-sm"> Save </button>
                            <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($jabatan as $key) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key->nama_jabatan ?>
                                </td>
                                <td> EDIT | DELETE</td>
                            </tr>
                        <?php } ?>
                    <tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>