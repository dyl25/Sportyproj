<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?= $title; ?></title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/materialize.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/athlete.css">
        <script src="<?= base_url(); ?>assets/javascript/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/materialize.min.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/myapp.js"></script>
        <script src="https://use.fontawesome.com/8c7af56c09.js"></script>       
        <?php
        if (isset($scripts)) {
            foreach ($scripts as $src) {
                ?>
                <script src="<?= $src; ?>" ></script>   
                <?php
            }
        }
        ?>
        <?php
        if (isset($customSrc)) {
            foreach ($customSrc as $src) {
                echo $src;
            }
        }
        ?>
    </head>
    <body>
        <!-- Sidenav -->
        <div class="row">
            <div class="col s12 m2 hide-on-small-only sideBack no-padding">
                <div>
                    
                </div>
                <ul>
                    <li><a href="<?= site_url('athlete/dashboard'); ?>"><i class="material-icons left">dashboard</i> Dashboard</a></li>
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
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">store</i> Club <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/club_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/club_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">alarm_on</i> Résultats <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/result_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/result_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">add_alert</i> Evénements <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/event_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/event_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">contacts</i> Entrainements <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('backoffice/training_admin'); ?>">Gérer</a></li>
                                        <li><a href="<?= site_url('backoffice/training_admin/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="<?= site_url('backoffice/map_admin/add'); ?>"><i class="material-icons left">location_on</i>Itinéraires</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('logout'); ?>" class="btn center waves"><i class="material-icons left">power_settings_new</i> Déconnexion</a></li>
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
                <main>
                    <?php if (isset($notification)) { ?>
                        <section>
                            <?php if ($notification['status'] == 'error') { ?>
                                <div class="card-panel red">
                                    <p class="white-text"><i class="material-icons">report_problem</i> <?= $notification['msg']; ?></p>
                                </div>
                            <?php } elseif ($notification['status'] == 'success') { ?>
                                <div class="card-panel green">
                                    <p class="white-text"><i class="material-icons">done</i> <?= $notification['msg']; ?></p>
                                </div>
                            <?php } ?>
                        </section>
                    <?php } elseif ($this->session->flashdata('notification')) { ?>
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
                    <section class="row">
                        <?php foreach ($content as $data): ?>
                            <?= $data; ?>
                        <?php endforeach; ?>
                    </section>
                </main>
            </div>
        </div>   
    </body>   
</html>