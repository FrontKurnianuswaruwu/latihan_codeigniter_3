<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
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
                    <a href="<?= base_url ()?>User/tambah" class="btn btn-primary">Tambah</a>
                    <?php if($this->session->userdata('successmsg')):?>
                    <p class="text-danger"><?= $this->session->userdata('successmsg')?></p>
                    <?php $this->session->unset_userdata('successmsg')?>
                    <?php endif; ?>

                </div>
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">userid</th>
                                <th scope="col">User name</th>
                                <th scope="col">Paswword</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($muser as $m):?>
                            <tr>
                                <td><?= $m['userid']?></td>
                                <td><?= $m['username']?></td>
                                <td><?= $m['password']?></td>
                                <td>
                                    <a href="<?= base_url()?>User/hapus/<?= $m['userid']?>"
                                        class=" btn btn-sm btn-dark"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url()?>User/edit/<?= $m['userid']?>"
                                        class=" btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->