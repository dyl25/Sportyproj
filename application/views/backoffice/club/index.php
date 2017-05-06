<section class="row">
    <div class="col m12">
        <h2>Liste des Clubs</h2>
        <a href="<?= site_url('backoffice/club_admin/add'); ?>" class="btn btn-primary waves-effect">Ajouter un club</a>
        <?php if ($this->session->flashdata('notification')) { ?>
            <?php if ($this->session->flashdata('notification')['status'] == 'error') { ?>
                <div class="card-panel red">
                    <p class="white-text"><i class="material-icons">report_problem</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                </div>
            <?php } elseif ($this->session->flashdata('notification')['status'] == 'success') { ?>
                <div class="card-panel green">
                    <p class="white-text"><i class="material-icons">done</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                </div>
            <?php } ?>
        <?php } ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom du club</th>
                    <th>Initiales</th>
                    <th>Adresse</th>
                    <th>Coordonnée Google Maps</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clubs as $club): ?>
                    <tr>
                        <td><?= $club->id; ?></td>
                        <td><?= $club->name; ?></a></td>
                        <td><?= $club->shortname; ?></td>
                        <td><?= $club->address; ?></td>
                        <td><?= $club->coord; ?></td>
                        <td>
                            <a href="<?= site_url('backoffice/club_admin/edit/') . $club->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                            <a href="<?= site_url('backoffice/club_admin/delete/') . $club->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
