<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('manage_events') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
            <div class="breadcrumb-item">All Events</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Event</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('manage_events') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="nama_event" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="tanggal_event" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Banner Kegiatan</label>
                                <div id="image-preview" class="dropify" data-show-loader="true" style="background-image: none; background-size: cover; background-position: center center;">
                                    <label for="banner_event" id="image-label">Choose File</label>
                                    <input type="file" name="banner_event" id="banner_event">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <form>
                                    <div class="form-group">
                                        <textarea class="summernote form-control" name="deskripsi_event" style="display: none;" required></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <textarea class="form-control" name="lokasi_event" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Event</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>