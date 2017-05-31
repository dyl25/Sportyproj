<div class="row">
    <div class="container">
        <div class="card-panel green">
            <p class="white-text"><i class="material-icons">done</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
        </div>
        <p><a href="<?= site_url('accueil'); ?>">Retour à l'accueil</a></p>
    </div>
</div>