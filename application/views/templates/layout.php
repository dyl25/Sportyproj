<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?= html_escape($title); ?></title>
        <?php if (isset($description)) { ?>
            <meta name="description" content="<?= $description; ?>"/>
        <?php } ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
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
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <header>

            <div class="">
                <nav class="light-blue darken-4">
                    <div class="nav-wrapper">
                        <a href="<?= site_url('accueil'); ?>" class="brand-logo center"><img src="<?= base_url(); ?>assets/images/logo_2_resize.png"></a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="<?= site_url('backoffice/user_admin/add'); ?>">Accueil</a>
                            </li>
                            <li>
                                <a href="<?= site_url('accueil'); ?>">Accueil</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Informations</a>
                            </li>
                            <li>
                                <a href="<?= site_url('article'); ?>">Articles</a>
                            </li>
                            <li>
                                <a href="<?= site_url('event'); ?>">Evénements</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Résultats</a>
                            </li>
                            <?php if (!isset($this->session->userdata['id'])) { ?>
                                <li>
                                    <a href="<?= site_url('signup'); ?>">S'inscrire</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('login'); ?>">Mon espace</a>
                                </li>
                            <?php } elseif ($this->session->userdata['role'] == 'user') { ?>
                                <li>
                                    <a href="<?= site_url('demande'); ?>">Devenir athlète</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a>
                                </li>
                            <?php } else { ?>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown1">Bienvenue, <?= $this->session->userdata['login'] ?><i class="material-icons right">arrow_drop_down</i></a>
                                    <ul id="dropdown1" class="dropdown-content">
                                        <li><a href="<?= site_url('user/dispatcher'); ?>"><span class="glyphicon glyphicon-user"></span> Mon espace</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?= site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- Nav mobile -->
                        <ul id="nav-mobile" class="side-nav">
                            <li>
                                <a href="<?= site_url('accueil'); ?>">Accueil</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Informations</a>
                            </li>
                            <li>
                                <a href="<?= site_url('article'); ?>">Articles</a>
                            </li>
                            <li>
                                <a href="<?= site_url('event'); ?>">Evénements</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Résultats</a>
                            </li>
                            <?php if (!isset($this->session->userdata['id'])) { ?>
                                <li>
                                    <a href="<?= site_url('signup'); ?>">S'inscrire</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('login'); ?>">Mon espace</a>
                                </li>
                            <?php } elseif ($this->session->userdata['role'] == 'user') { ?>
                                <li>
                                    <a href="<?= site_url('demande'); ?>">Devenir athlète</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a>
                                </li>
                            <?php } else { ?>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown2">Bienvenue, <?= $this->session->userdata['login'] ?><i class="material-icons right">arrow_drop_down</i></a>
                                    <ul id="dropdown2" class="dropdown-content">
                                        <li><a href="<?= site_url('user/dispatcher'); ?>"><span class="glyphicon glyphicon-user"></span> Mon espace</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?= site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                    </div>

                </nav>

            </div>

        </header>
        <main>
            <?php foreach ($content as $data): ?>
                <?= $data; ?>
            <?php endforeach; ?>
        </main>
        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text title">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text title">Links</h5>
                        <ul>
                            <li>
                                <a href="<?= site_url('accueil'); ?>">Accueil</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Informations</a>
                            </li>
                            <li>
                                <a href="<?= site_url('article'); ?>">Articles</a>
                            </li>
                            <li>
                                <a href="<?= site_url('event'); ?>">Evénements</a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact'); ?>">Résultats</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l3 s12 reseautage">
                        <ul>
                            <li><a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Google +"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="#">Dylan Vansteenacker</a>
                </div>
            </div>
        </footer>
    </body>
</html>
