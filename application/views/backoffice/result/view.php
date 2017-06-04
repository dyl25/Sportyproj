<section class="row">
    <h2><?= html_escape($club->name); ?></h2>

    <h3>Informations</h3>
    <div class="data-striped data-highlight">
        <p>Id : <?= html_escape($club->id); ?></p>
        <p>Nom : <?= html_escape($club->name); ?></p>
    </div>
</section>
