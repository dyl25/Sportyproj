<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?= $title; ?></title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/materialize.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
        <script src="<?= base_url(); ?>assets/javascript/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/materialize.min.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/myapp.js"></script>
        <script src="https://use.fontawesome.com/8c7af56c09.js"></script>
        <?php
        if (isset($scripts)) {
            foreach ($scripts as $src) {
                ?>
                <script src="<?= base_url() . $src; ?>"></script>   
                <?php
            }
        }
        ?>
    </head>
    <body>
        <!-- Sidenav -->
        <div class="row">
            <div class="col s12 m2 hide-on-small-only sideBack no-padding">
                <ul>
                    <li><a href="<?= site_url('backoffice/dashboard_admin'); ?>"><i class="material-icons left">dashboard</i> Dashboard</a></li>
                    <li class="no-padding">
                        <ul class="collapsible no-margin" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">supervisor_account</i> Users <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/user_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/user_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">library_books</i> Articles <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/article_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/article_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col s12 m10 offset-m2">
                <!-- Nav mobile -->
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#"><i class="material-icons left">dashboard</i> Dashboard</a></li>
                    <li class="no-padding">
                        <ul class="collapsible no-margin" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">supervisor_account</i> Users <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="#!">Gérer</a></li>
                                        <li><a href="#!">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">library_books</i> Articles <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="#!">Gérer</a></li>
                                        <li><a href="#!">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>

                <?php foreach ($content as $data): ?>
                    <?= $data; ?>
                <?php endforeach; ?>
            </div>
        </div>   
    </body>   
</html>