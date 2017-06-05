<section class="row">
    <h2><?= html_escape($title); ?></h2>
    <div class="data-striped data-highlight">
        <p>Login : <?= html_escape($athlete->login); ?></p>
        <p>E-mail : <?= html_escape($athlete->email); ?></p>
        <p>Club : <?= html_escape($athlete->clubName); ?></p>
        <p>Catégorie: <?= html_escape($athlete->categoryName); ?></p>
        <p>Numéro de dossard : <?= html_escape($athlete->register_num); ?></p>
    </div>
</section>
