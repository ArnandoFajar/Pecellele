<?= $this->extend('layouts/backend') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Galeri</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-danger card-outline">
                    <div class="card-body pad table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <p>Silakan Atur Galeri di beranda</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tambah-galeri">
                                Tambah Galeri
                            </button>
                        </div>
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height: 500px;">
                                <table class="table" id="table-galeri">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- Modal Add  -->
                        <div class="modal fade" id="modal-tambah-galeri" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Galeri</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-add-galeri" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?= csrf_field(); ?>
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview');">
                                                <img id="preview" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
                                                <span class="text-danger error-text gambar_error"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- Modal Edit  -->
                        <div class="modal fade" id="modal-edit-galeri" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Galeri</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-edit-galeri" action="<?= base_url('admin/menu/updateminuman'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" id="id-galeri" name="id">
                                            <input type="hidden" id="gambar_old-galeri" name="gambar_old">
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview2');">
                                                <img id="preview2" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
                                                <span class="text-danger error-text gambar_error"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

<?= $this->endSection('content') ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#table-galeri').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo base_url('admin/galeri/getgaleri') ?>",
        });
    });

    //add galeri
    $('#form-add-galeri').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/galeri/addgaleri'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
                $("#modal-tambah-galeri").modal('hide');
                $('#table-galeri').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                alert(data.msg);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    //getdataedit
    function editGaleriFunc(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/galeri/getgaleribyid') ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#modal-edit-galeri').modal('show');
                $('#id-galeri').val(res.id);
                $('#gambar_old-galeri').val(res.gambar);
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
            }
        });
    }

    //update galeri
    $('#form-edit-galeri').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/galeri/updategaleri'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $("#modal-edit-galeri").modal('hide');
                $('#table-galeri').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                alert(data.msg);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    //delete
    function deleteGaleriFunc(id) {
        if (confirm("Delete record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/galeri/deletegaleri'); ?>",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == 1) {
                        $('#table-galeri').dataTable().fnDraw(false);
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }

    //preview image
    function previewFile(input, id) {
        var file = input.files[0]

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#" + id + "").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
<?= $this->endSection('script'); ?>