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
        <h2 class="section-title">Edit Event</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <p>edit event</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            imagediv.appendChild(newimg);
        }
    </script>
</section>
<?= $this->endSection() ?>