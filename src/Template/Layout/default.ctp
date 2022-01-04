    <?php
    $title = 'Direção-Geral de Reinserção e Serviços Prisionais ';
    $currentYear = date('Y');
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $title ?></title>

        <!-- Custom fonts for this template-->
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <link href="/css/intlTelInput.min.css" rel="stylesheet">
        <?= $this->fetch('css') ?>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?= $this->element('Nav/sidebar', ['title' => $title]); ?>
            <?php //= $this->element('Nav/sidebar', ['title' => $title], ['cache' => true]); 
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->

                    <!-- End of Topbar -->
                    <?= $this->element('Nav/topbar'); ?>
                    <?php //= $this->element('Nav/topbar', [], ['cache' => true]); 
                    ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <?= $title ?> <?= $currentYear ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?= $this->element('Modal/logout'); ?>
        <!-- Login Modal-->
        <?= $this->element('Modal/login'); ?>

        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="/js/sb-admin-2.min.js"></script>
        <script src="/js/jquery.maskMoney.min.js"></script>

        <!-- <script src="/js/jquery.mask.js"></script> -->
        <script src="/js/intlTelInput.js"></script>
        <?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', ['block' => true]); ?>
        <?= $this->Html->css('https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css', ['block' => true]); ?>
        <?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['block' => true]); ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('scriptBottom') ?>
    </body>

    <?php if ($this->request->getSession()->read('Auth.User.show') == true) : ?>
        <a id="login" class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal" hidden>
            <script>
                $("#login").trigger("click");
            </script>
            <?php
            $session = $this->request->session();
            $session->write('Auth.User.show', false);
            ?>
        <?php endif ?>

    </html>