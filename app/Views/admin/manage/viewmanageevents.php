<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage > Manage Events</h1>
    </div>

    <div class="section-body">
        <form class="row form-inline mr-auto mb-3">
            <div class="col-9 search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" style="width: 250px;">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-light" style="background-color:#FF017E; color:white;" data-toggle="modal" data-target="#addEvent">ADD EVENT</button>
            </div>
        </form>
        <?php foreach ($query as $key => $value) : ?>
            <div class="card border" style="width: 18rem; border-radius:25px;">
                <img src="assets/img/pink.jpg" class="card-img-top" style="border-radius: 25px 25px 0px 0px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $value->nama_event ?></h5>
                    <p><?= $value->tanggal_event ?></p>
                    <p class="card-text">lorem ipsum lorem</p>
                    <a href="#">Event Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- START MODAL -->
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEvent" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEvent">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
</section>
<?= $this->endSection() ?>