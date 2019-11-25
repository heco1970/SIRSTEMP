<!-- Outer Row -->
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image">SIRS</div>
          <div class="col-lg-6">
            <div class="p-5">
              <?= $this->Flash->render() ?>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><?=__('Login')?></h1>
              </div>
              <?= $this->Form->create('User', ['class' => 'user']) ?>
                <div class="form-group">
                  <?= $this->Form->control('username',['class' => 'form-control form-control-user', 'placeholder' => __('Enter Username'), 'label' => false]) ?>
                </div>
                <div class="form-group">
                  <?= $this->Form->control('password',['class' => 'form-control form-control-user', 'placeholder' => __('Password'), 'label' => false]) ?>
                </div>
                <button class="btn btn-primary btn-user btn-block" ><?=__('Login')?></button>
                <hr>

              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
