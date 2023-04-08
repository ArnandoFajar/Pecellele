<?= $this->extend('layouts/backend') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Menu</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-utensils"></i>
                            Makanan
                        </h3>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <p>Silakan Atur Makanan yang tersedia di beranda</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah-makanan">
                                Tambah Makanan
                            </button>
                        </div>
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height: 500px;">
                                <table class="table" id="table-makanan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Makanan</th>
                                            <th>Keterangan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>

                        <!-- Modal Add  -->
                        <div class="modal fade" id="modal-tambah-makanan" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Makanan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-add-makanan" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Makanan</label>
                                                <input required type="text" class="form-control" id="nama-add-makanan" name="nama" placeholder="misalnya Pecel Lele ..">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Makanan</label>
                                                <textarea required class="form-control" id="keterangan-add-makanan" name="keterangan" rows="3" placeholder="Dengan kuah sambel atau lalapan misalnya .."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Harga Makanan</label>
                                                <input required type="number" class="form-control" id="harga-add-makanan" name="harga"></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Status Makanan</label>
                                                <select required class="form-control" aria-label="Default select example" id="status-add-makanan" name="status">
                                                    <option selected value="">Status</option>
                                                    <option value="tersedia">Tersedia</option>
                                                    <option value="tidak">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview-makanan1');">
                                                <img id="preview-makanan1" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
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
                        <div class="modal fade" id="modal-edit-makanan" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Makanan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-edit-makanan" action="<?= base_url('admin/menu/updatemakanan'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" id="id-makanan" name="id">
                                            <input type="hidden" id="gambar_old-makanan" name="gambar_old">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Makanan</label>
                                                <input required type="text" class="form-control" id="nama-makanan" name="nama" placeholder="misalnya Pecel Lele ..">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Makanan</label>
                                                <textarea required class="form-control" id="keterangan-makanan" name="keterangan" rows="3" placeholder="Dengan kuah sambel atau lalapan misalnya .."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Harga Makanan</label>
                                                <input required type="number" class="form-control" id="harga-makanan" name="harga"></input>
                                            </div>
                                            <select required name="status" class="form-control" id="status-makanan" aria-label="Default select example">
                                                <option selected value="">Status</option>
                                                <option value="tersedia">Tersedia</option>
                                                <option value="tidak">Tidak Tersedia</option>
                                            </select>
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview-makanan2');">
                                                <img id="preview-makanan2" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
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
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-wine-glass-alt"></i>
                            Minuman
                        </h3>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <p>Silakan Atur Minuman yang tersedia di beranda</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah-minuman">
                                Tambah Minuman
                            </button>
                        </div>
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height: 500px;">
                                <table class="table" id="table-minuman">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Minuman</th>
                                            <th>Keterangan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- Modal Add  -->
                        <div class="modal fade" id="modal-tambah-minuman" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Minuman</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-add-minuman" action="<?= base_url(''); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Minuman</label>
                                                <input required type="text" class="form-control" id="nama-add-minuman" name="nama" placeholder="misalnya Es Jeruk ..">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Minuman</label>
                                                <textarea required class="form-control" id="keterangan-add-minuman" name="keterangan" rows="3" placeholder="Jeruk Indramayu"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Harga Minuman</label>
                                                <input required type="number" class="form-control" id="harga-add-minuman" name="harga"></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Status Minuman</label>
                                                <select required class="form-control" id="status-add-minuman" aria-label="Default select example" name="status">
                                                    <option selected value="">Status</option>
                                                    <option value="tersedia">Tersedia</option>
                                                    <option value="tidak">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview-minuman1');">
                                                <img id="preview-minuman1" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
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
                        <div class="modal fade" id="modal-edit-minuman" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Minuman</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="form-edit-minuman" action="<?= base_url('admin/menu/updateminuman'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" id="id-minuman" name="id">
                                            <input type="hidden" id="gambar_old-minuman" name="gambar_old">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Minuman</label>
                                                <input required type="text" class="form-control" id="nama-minuman" name="nama" placeholder="misalnya Es teh ..">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Minuman</label>
                                                <textarea required class="form-control" id="keterangan-minuman" name="keterangan" rows="3" placeholder="Teh Melati .."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Harga Minuman</label>
                                                <input required type="number" class="form-control" id="harga-minuman" name="harga"></input>
                                            </div>
                                            <select required name="status" class="form-control" id="status-minuman" aria-label="Default select example">
                                                <option selected value="">Status</option>
                                                <option value="tersedia">Tersedia</option>
                                                <option value="tidak">Tidak Tersedia</option>
                                            </select>
                                            <div class="form-group mb-2">
                                                <label for="">gambar</label>
                                                <input type="file" name="gambar" class="form-control mb-3" onchange="previewFile(this,'preview-minuman2');">
                                                <img id="preview-minuman2" src="<?= base_url('assets/backend/dist/img/preview.png'); ?>" class="img-thumbnail w-25" alt="Placeholder">
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
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div>
</section>
<!-- /.content -->

<?= $this->endSection('content') ?>

<!-- script  -->
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#table-makanan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo base_url('admin/menu/getmakanan') ?>",
        });

        $('#table-minuman').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo base_url('admin/menu/getminuman') ?>",
        });

    });

    function resetValueMakanan() {
        $('#nama-add-makanan').val('');
        $('#keterangan-add-makanan').val('');
        $('#harga-add-makanan').val('');
        $('#status-add-makanan').val('');
    }
    function resetValueMinuman() {
        $('#nama-add-minuman').val('');
        $('#keterangan-add-minuman').val('');
        $('#harga-add-minuman').val('');
        $('#status-add-minuman').val('');
    }


    //add makanan
    $('#form-add-makanan').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/menu/addmakanan'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
                $("#modal-tambah-makanan").modal('hide');
                $('#table-makanan').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                resetValueMakanan();
                alert(data.msg);
            },
            error: function(data) {
                resetValueMakanan();
                console.log(data);
            }
        });
    });

    //add minuman
    $('#form-add-minuman').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/menu/addminuman'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
                $("#modal-tambah-minuman").modal('hide');
                $('#table-minuman').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                resetValueMinuman();
                alert(data.msg);
            },
            error: function(data) {
                resetValueMinuman();
                console.log(data);
            }
        });
    });

    //getdataedit
    function editMakananFunc(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/menu/getmakananbyid') ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#modal-edit-makanan').modal('show');
                $('#id-makanan').val(res.id);
                $('#gambar_old-makanan').val(res.gambar);
                $('#nama-makanan').val(res.nama);
                $('#keterangan-makanan').val(res.keterangan);
                $('#harga-makanan').val(res.harga);
                $('#status-makanan').val(res.status);
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
            }
        });
    }

    //update makanan
    $('#form-edit-makanan').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/menu/updatemakanan'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $("#modal-edit-makanan").modal('hide');
                $('#table-makanan').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                alert(data.msg);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    //get data edit
    function editMinumanFunc(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/menu/getminumanbyid') ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#modal-edit-minuman').modal('show');
                $('#id-minuman').val(res.id);
                $('#gambar_old-minuman').val(res.gambar);
                $('#nama-minuman').val(res.nama);
                $('#keterangan-minuman').val(res.keterangan);
                $('#harga-minuman').val(res.harga);
                $('#status-minuman').val(res.status);
                $('input[name="gambar"]').val('');
                $('img[class="img-thumbnail w-25"]').attr('src', '<?= base_url('assets/backend/dist/img/preview.png'); ?>');
            }
        });
    }
    //update Minuman
    $('#form-edit-minuman').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/menu/updateminuman'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $("#modal-edit-minuman").modal('hide');
                $('#table-minuman').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                alert(data.msg);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    //delete
    function deleteMakananFunc(id) {
        if (confirm("Delete record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/menu/deletemakanan'); ?>",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == 1) {
                        $('#table-makanan').dataTable().fnDraw(false);
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

    function deleteMinumanFunc(id) {
        if (confirm("Delete record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/menu/deleteminuman'); ?>",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == 1) {
                        $('#table-minuman').dataTable().fnDraw(false);
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