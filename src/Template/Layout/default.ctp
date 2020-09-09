    <?php
    $title = 'Direção-Geral de Reinserção e Serviços Prisionais ';
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
            <?= $this->fetch('css') ?>

        </head>

        <body id="page-top">

            <!-- Page Wrapper -->
            <div id="wrapper">

                <!-- Sidebar -->
                <?= $this->element('Nav/sidebar', ['title' => $title]); ?>
                <?php //= $this->element('Nav/sidebar', ['title' => $title], ['cache' => true]); ?>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->

                        <!-- End of Topbar -->
                        <?= $this->element('Nav/topbar'); ?>
                        <?php //= $this->element('Nav/topbar', [], ['cache' => true]); ?>
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
                                <span>Copyright &copy; <?= $title ?> 2020</span>
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

            <script src="/vendor/jquery/jquery.min.js"></script>
            <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="/js/sb-admin-2.min.js"></script>
            <?= $this->fetch('script') ?>
            <?= $this->fetch('scriptBottom') ?>
        </body>

        <style>
        /* The Modal (background) */
        .modale {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modale-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 75%; /* Could be more or less, depending on screen size */
            height: 45%;
        }

        /* The Close Button */
        .exit {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .exit:hover,
        .exit:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        } 
    </style>

    <?php if ($this->request->getSession()->read('Auth.User.show') == true): ?>
        <!-- The Modal -->
        <div id="myModal" class="modale">

        <!-- Modal content -->
        <div class="modale-content container">
            <div class="float-right"><span id="fechar" class="exit">&times;</span></div>
            <div class="row mt-4">
                <div class="col-4 d-flex justify-content-center">
                    <img src="https://picsum.photos/200/300" class="rounded-circle w-75 h-50" alt="Profile"> 
                </div>
                <div class="col-8">
                    <div class="mt-4">
                        <?php 
                            $session = $this->request->session();
                            $session->write('Auth.User.show', false); 
                            echo "<h5><b>Nome: </b>".$this->request->getSession()->read('Auth.User.name')."</h5>";
                            echo "<h5><b>Username: </b>".$this->request->getSession()->read('Auth.User.username')."</h5>";
                            echo "<h5><b>Email: </b>".$this->request->getSession()->read('Auth.User.email')."</h5>";
                            echo "<h5><b>Ultimo acesso: </b>".$this->request->getSession()->read('Auth.User.last')."</h5>";
                        ?>
                        <script>
                            window.onload = function mod() {
                                modal.style.display = "block";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementById("fechar");

        // When the user clicks on <span> (x), close the modal
        if (span){
            span.onclick = function() {
                modal.style.display = "none";
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</html>
