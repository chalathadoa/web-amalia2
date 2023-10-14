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
        <h1>Detail Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
            <div class="breadcrumb-item">All Events</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Amalia Berbagi</h2>
    </div>
    <div lass="mt-3">
        <img src="/assets/img/try/ungu.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="row mt-3">
        <img class="col-2 rounded-circle mr-1" src="/assets/img/logo/logo.png" style="height: auto;" alt="">
        <div class="col">
            <p class="d-sm-none d-lg-inline-block">Amalia Khairun Nisa'</p>
            <p>Kamis, 21 September 2023</p>
        </div>
    </div>
    <div class="mt-3 mb-3" style="text-align:justify; font-size:18px;">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus erat vel sodales consequat. Nam hendrerit risus nec metus pretium facilisis. Quisque eu posuere libero, et pharetra erat. Ut luctus tortor at eleifend dictum. Mauris sapien mauris, accumsan eu lacus sit amet, lobortis dignissim dui. Cras tempor tortor sed urna volutpat, non bibendum massa efficitur. Nulla facilisi. Fusce ac augue ante. Morbi vitae molestie ex, non facilisis felis. Aliquam iaculis interdum nisi a semper. Sed laoreet, tortor ut cursus ultricies, ipsum turpis pulvinar ligula, ut ultricies neque orci id enim. In volutpat tempor vulputate. Nulla laoreet nulla et consectetur ullamcorper. Morbi gravida molestie lacus a porttitor. Mauris a maximus elit, in volutpat metus. Suspendisse potenti.
        </p>
    </div>
</section>
<?= $this->endSection() ?>