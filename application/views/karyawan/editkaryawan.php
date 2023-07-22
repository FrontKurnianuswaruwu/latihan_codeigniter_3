<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Collapsed Sidebar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->userdata('errormsg')):?>
                    <p class="text-danger"><?= $this->session->userdata('errormsg')?></p>
                    <?php $this->session->unset_userdata('errormsg')?>
                    <?php endif; ?>
                    <form action="<?= base_url ()?>Karyawan/editkaryawan_post" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Karyawan</label>
                            <input type="text" class="form-control" value="<?= $karyawan->idkaryawan?>" id="idkaryawan"
                                name="idkaryawan" readonly maxlength="4">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Karyawan</label>
                            <input type="text" class="form-control" value="<?= $karyawan->namakaryawan?>" id="namakaryawan"
                                name="namakaryawan" required maxlength="10">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
