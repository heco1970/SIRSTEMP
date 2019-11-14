<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=__('Add')?></h6>
  </div>
  <?= $this->Form->create($user,['type' => 'file']) ?>
  <div class="card-body">
    
    <div class="row">
      <div class="col-sm-3">
        <div class="text-center">
          <img id="avatar" src="/img/user.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="max-width: 210px">
          <?= $this->Form->control('photo', ['type' => 'file', 'label' => false, 'required' => false]); ?>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="form-group">
          <div class="col-xs-6">
            <label for="username"><h4><?=__('Username')?></h4></label>
            <?= $this->Form->control('username',['class' => 'form-control', 'name' => 'username', 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Name')?></h4></label>
            <?= $this->Form->control('name',['class' => 'form-control', 'name' => 'name', 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Password')?></h4></label>
            <?= $this->Form->control('password',['class' => 'form-control', 'name' => 'password', 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Confirm Password')?></h4></label>
            <?= $this->Form->control('password_confirm',['class' => 'form-control', 'name' => 'password_confirm', 'label' => false, 'type' => 'password']);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="email"><h4><?=__('Email')?></h4></label>
            <?= $this->Form->control('email',['class' => 'form-control', 'name' => 'email', 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="created"><h4><?=__('Type')?></h4></label>
            <?= $this->Form->control('type_id',['class' => 'form-control', 'name' => 'type_id', 'options' => $types, 'empty' => true, 'label' => false]);?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer card-footer-fixed">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success float-right']) ?>
    <a href="/users/index" class="btn btn-secondary float-right space-right"><?=__('Cancel')?></a>
  </div>
  <?= $this->Form->end() ?>
</div>

<?=$this->Html->script('/js/user-helper.js', ['block' => true]);?>