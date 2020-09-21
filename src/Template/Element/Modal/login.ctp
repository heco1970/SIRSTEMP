<div class="modal fade bd-example-modal-xl" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bem vindo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row mt-4">
                <div class="col-4 d-flex justify-content-center">
                    <img src="https://picsum.photos/200/300" class="rounded-circle" style="width: 80%; height: 200px" alt="Profile"> 
                </div>
                <div class="col-8">
                    <div class="mt-4">
                        <?php 
                            echo "<h5><b>Nome: </b>".$this->request->getSession()->read('Auth.User.name')."</h5>";
                            echo "<h5><b>Username: </b>".$this->request->getSession()->read('Auth.User.username')."</h5>";
                            echo "<h5><b>Email: </b>".$this->request->getSession()->read('Auth.User.email')."</h5>";
                            echo "<h5><b>Ultimo acesso: </b>".$this->request->getSession()->read('Auth.User.last')."</h5>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>
        </div>
    </div>
  </div>
</div>