<?= $this->extend('layouts/frontend'); ?>

<?= $this->section('content'); ?>

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h1>Tentang Kami</h1>
        </div>

        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/frontend/img/tentang-kami.jpg) ;" data-aos="fade-up" data-aos-delay="150">
                <div class="call-us position-absolute">
                    <h4>Pesan Sekarang</h4>
                    <p>0821-1740-2004</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                    <p>
                        Mbok Citro Merupakan Rumah Makan Pecel Lele Yang Berada Di Pusat Kota Bandar Lampung, Dekat Mall Boemi Kedatan Atau Samping RADAR Lampung.
                    </p>
                    <p>
                        Dengan Ciri Khas Sambel Dadak Rampai Yang Bercita Rasa Khas Lampung Banget, Dipadupadankan Dengan Nasi Dan Lauk Yang Kami Jaga Standarnya, Supaya Kamu Bisa Selalu Lahap Makan Disini..
                        Yang Pasti Aman Dikantong Ya...
                    </p>

                    <div class="position-relative mt-4">
                        <img src="assets/frontend/img/tentang-kami2.jpg" class="img-fluid" alt="">
                        <a href="https://youtu.be/0uzCKNBWhMg" class="glightbox play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End About Section -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>Kenapa Harus Makan di Pecel lele Mbok Citro?</h3>
                    <p>
                        Disini, Pecel lele Mbok Citro terkenal dengan kebersihan tempatnya, nyaman serta memiliki citra rasa sambal Yang
                        enak dan pedas yang berasal dari hasil racikan resep Mbok Citro 
                    </p>
                </div>
            </div><!-- End Why Box -->

            <div class="col-lg-8 d-flex align-items-center">
                <div class="row gy-4">

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-emoji-heart-eyes"></i>
                            <h4>Rasa Sambal Yang enak</h4>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-check2-square"></i>
                            <h4>kebersihan</h4>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-coin"></i>
                            <h4>Harga Terjangkau</h4>
                        </div>
                    </div><!-- End Icon Box -->

                </div>
            </div>

        </div>

    </div>
</section><!-- End Why Us Section -->

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h1>Menu</h1>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-makanan">
                    <h4>Makanan</h4>
                </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-minuman">
                    <h4>Minuman</h4>
                </a><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <div class="tab-pane fade active show" id="menu-makanan">

                <div class="tab-header text-center">
                    <!-- <p>Menu</p>
                    <h3>Makanan</h3> -->
                </div>

                <div class="row gy-5">

                    <?php foreach ($dataMakanan as $key => $value) : ?>
                    <div class="col-lg-4 menu-item">
                        <a href="assets/upload/<?= $value['gambar']; ?>" class="glightbox"><img src="assets/upload/<?= $value['gambar']; ?>" class="menu-img img-fluid" alt=""></a>
                        <h4><?= $value['nama']; ?></h4>
                        <p class="ingredients">
                            <?= $value['keterangan']; ?>
                        </p>
                        <p class="price">
                            <?= rupiah($value['harga']); ?>
                        </p>
                    </div><!-- Menu Item -->
                    <?php endforeach ?>

                </div>
            </div><!-- End Starter Menu Content -->

            <div class="tab-pane fade" id="menu-minuman">

                <div class="tab-header text-center">
                    <!-- <p>Menu</p>
                    <h3>Minuman</h3> -->
                </div>

                <div class="row gy-5">

                <?php foreach ($dataMinuman as $key => $value) : ?>
                    <div class="col-lg-4 menu-item">
                        <a href="assets/upload/<?= $value['gambar']; ?>" class="glightbox"><img src="assets/upload/<?= $value['gambar']; ?>" class="menu-img img-fluid" alt=""></a>
                        <h4><?= $value['nama']; ?></h4>
                        <p class="ingredients">
                            <?= $value['keterangan']; ?>
                        </p>
                        <p class="price">
                            <?= rupiah($value['harga']); ?>
                        </p>
                    </div><!-- Menu Item -->
                    <?php endforeach ?>

                </div>
            </div><!-- End Breakfast Menu Content -->

        </div>

    </div>
</section><!-- End Menu Section -->

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h1>Galeri</h1>
        </div>

        <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <?php foreach ($dataGaleri as $value) : ?>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?= base_url('assets/upload/'.$value['gambar']); ?>"><img src="<?= base_url('assets/upload/'.$value['gambar']); ?>" class="img-fluid" alt=""></a></div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Gallery Section -->

<!-- ======= Book A Table Section ======= -->
<section id="contact" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h1>Reservasi</h1>
        </div>

        <div class="row g-0">
            <div class="col-lg-12 d-flex align-items-center reservation-form-bg">
                <form action="<?= base_url('addreservasi'); ?>" id="form-reservasi" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <input required type="text" name="nama" class="form-control" id="nama" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input required type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input required type="text" class="form-control" name="telp" id="telp" placeholder="No Telp" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input required type="date" name="tanggalbooking" class="form-control" id="date" placeholder="Tanggal" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input required type="time" class="form-control" name="waktubooking" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input required type="number" class="form-control" name="jumlah" id="people" placeholder="# Jumlah Orang" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea required class="form-control" name="pesan" rows="5" placeholder="Silakan masukkan pesanan Anda"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div id="gagalKirim" class="error-message"></div>
                        <div id="berhasilKirim" class="sent-message"></div>
                    </div>
                    <div class="text-center"><button type="submit">Pesan</button> <button type="submit" class="m-4"><i></i> Atau Langsung Whatsapp</button></div>
                </form>
            </div><!-- End Reservation Form -->

        </div>

    </div>
</section><!-- End Book A Table Section -->


<!-- ======= lokasi Section ======= -->
<section id="lokasi" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h1>Lokasi Pecel Lele Mbok Citro</h1>
        </div>

        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.250450154501!2d105.25910011452171!3d-5.378734555293931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dbdc3cd2fe43%3A0xd68cefff8205143a!2sMbok%20Citro%20-%20Pecel%20Lele!5e0!3m2!1sid!2sid!4v1680269855815!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->
    </div>
</section><!-- End Contact Section -->


<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
        //add reservasi
        $('#form-reservasi').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('addreservasi'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                if(data.code == 1){
                    $('#berhasilKirim').html(data.msg);
                    $('#berhasilKirim').show();
                }else{
                    $('#gagalKirim').html(data.msg);
                    $('#gagalKirim').show();
                }
            },
            error: function(data) {
                $('#gagalKirim').html(data.msg);
            }
        });
    });

</script>
<?= $this->endSection('script'); ?>