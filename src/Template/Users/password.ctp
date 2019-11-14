<?php
  if ($admin) {
    $title = __('Change Password of') . ' ' . $name;
    $backUrl = '/users/index';
  } else {
    $title = __('Change Password');
    $backUrl = '/users/profile';
  }
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">    
    
    <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
  </div>
  <?= $this->Form->create($user) ?>
  <div class="card-body">
    
    <div class="row">
      <div class="col-sm-12">
        <?php if (!$admin):?>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Current Password')?></h4></label>
            <?= $this->Form->control('password_old',['class' => 'form-control', 'name' => 'password_old', 'label' => false, 'type' => 'password']);?>
          </div>
        </div>
        <?php endif;?>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('New Password')?></h4></label>
            <?= $this->Form->control('password',['class' => 'form-control', 'name' => 'password', 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Confirm New Password')?></h4></label>
            <?= $this->Form->control('password_confirm',['class' => 'form-control', 'name' => 'password_confirm', 'label' => false, 'type' => 'password']);?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer card-footer-fixed">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-warning float-right']) ?>
    <a href="<?=$backUrl?>" class="btn btn-secondary float-right space-right"><?=__('Cancel')?></a>
  </div>
  <?= $this->Form->end() ?>
</div>