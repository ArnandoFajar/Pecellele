<?= $this->extend('layouts/backend') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Reservasi</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-lime card-outline">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Status Reservasi</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body border p-0" style="display: block;">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a id="semuapesanan" href="#" class="nav-link">
                                        <i class="fas fa-inbox"></i> Semua Pesan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="booking" href="#" class="nav-link">
                                        <i class="far fa-envelope"></i> Booking
                                        <span class="totalBookingSidebar badge bg-warning float-right"><?= isset($totalBookingSidebar) ? $totalBookingSidebar : ''  ?></span>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="terlaksana" href="#" class="nav-link">
                                        <i class="far fa-file-alt"></i> Terlaksana
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="batal" href="#" class="nav-link">
                                        <i class="fas fa-window-close"></i> Batal
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card -->

            <!-- /.col-md-9 -->
            <div class="col-lg-9">
                <div class="card card-indigo card-outline">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Data Reservasi</h3>
                        </div>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height: 500px;">
                                <table class="table" id="table-reservasi">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Booking</th>
                                            <th>No Telp</th>
                                            <th>Status Booking</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <!-- Modal Edit  -->
                    <div class="modal fade" id="modal-edit-reservasi" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Galeri</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form-edit-reservasi" action="<?= base_url('admin/menu/updateminuman'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" id="id-reservasi" name="id">
                                        <div class="form-group mb-2">
                                            <label for="">Status Reservasi</label>
                                            <select required name="statusorder" class="form-control" id="status-order">
                                                <option selected value="">Status</option>
                                                <option value="booking">Booking</option>
                                                <option value="terlaksana">Terlaksana</option>
                                                <option value="batal">Batal</option>
                                            </select>
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

                    <!-- Modal Lihat  -->
                    <div class="modal fade" id="modal-lihat-reservasi" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Lihat Pesanan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= csrf_field(); ?>
                                    <div class="mb-2">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" id="nama" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">email</label>
                                        <input type="text" class="form-control" id="email" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">telp</label>
                                        <input type="text" class="form-control" id="telp" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Tanggal Booking</label>
                                        <input type="text" class="form-control" id="tanggalbooking" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Waktu Booking</label>
                                        <input type="text" class="form-control" id="tanggalbooking" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Pesan</label>
                                        <textarea class="form-control" id="pesan" disabled></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-right">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

<?= $this->endSection('content') ?>

<?= $this->section('script'); ?>
<script>
    var tableLama = '';
    $(document).ready(function() {
        $('#semuapesanan').addClass('active');
        tableLama = $('#table-reservasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo base_url('admin/reservasi/getreservasi') ?>",
        });
    });

    //get datatable by jenis reservasi
    function getDatatables(jenisreservasi) {
        tableLama.destroy();
        tableLama = $('#table-reservasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo base_url('admin/reservasi/getreservasi') ?>",
                method: "GET",
                data: function(d) {
                    d.statusreservasi = jenisreservasi
                }
            }
        });
    }

    //menghapus status active 
    function deleteStatusActive() {
        $('#semuapesanan').removeClass('active');
        $('#booking').removeClass('active');
        $('#terlaksana').removeClass('active');
        $('#batal').removeClass('active');
    }

    //event click order
    $('#semuapesanan').click(function(e) {
        getDatatables('semuapesanan');
        deleteStatusActive();
        $('#semuapesanan').addClass('active');
    })
    $('#booking').click(function(e) {
        getDatatables('booking');
        deleteStatusActive();
        $('#booking').addClass('active');
    })
    $('#terlaksana').click(function(e) {
        getDatatables('terlaksana');
        deleteStatusActive();
        $('#terlaksana').addClass('active');
    })
    $('#batal').click(function(e) {
        getDatatables('batal');
        deleteStatusActive();
        $('#batal').addClass('active');
    })

    //getdataedit
    function editReservasiFunc(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/reservasi/getreservasibyid') ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#modal-edit-reservasi').modal('show');
                $('#id-reservasi').val(res.id);
                $('#statusorder').val(res.statusorder);
            }
        });
    }

    //update reservasi
    $('#form-edit-reservasi').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/reservasi/updatereservasi'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $("#modal-edit-reservasi").modal('hide');
                $('#table-reservasi').dataTable().fnDraw(false);
                $("#btn-save").attr("disabled", false);
                $(".totalBookingSidebar").html(data.totalBookingSidebar)
                alert(data.msg);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    //delete
    function deleteReservasiFunc(id) {
        if (confirm("Delete record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/reservasi/deletereservasi'); ?>",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == 1) {
                        $('#table-reservasi').dataTable().fnDraw(false);
                        $(".totalBookingSidebar").html(data.totalBookingSidebar)
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                        $(".totalBookingSidebar").html(data.totalBookingSidebar)
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }

    //lihat data
    function viewReservasiFunc(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/reservasi/getreservasibyid') ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#modal-lihat-reservasi').modal('show');
                $('#nama').val(res.nama);
                $('#email').val(res.email);
                $('#telp').val(res.telp);
                $('#tanggalbooking').val(res.tanggalbooking);
                $('#waktubooking').val(res.waktubooking);
                $('#jumlah').val(res.jumlah);
                $('#pesan').val(res.pesan);
                $('#statusorder').val(res.statusorder);
            }
        });
    }
</script>
<?= $this->endSection('script'); ?>