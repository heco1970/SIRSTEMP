<?php 
$action = $this->request->getParam('action');

$hrefEdit = $aTextBack = $hrefBack = $title = '';
$disabled = true;
$submit = $profile = $viewDates = false;

switch ($action) {
    case 'profile':
        $title = __('Profile');
        $profile = true;
        if ($edit) {
          $disabled = false;
          $hrefBack = '/users/profile';
          $aTextBack = __('Cancel');
          $submit = true;
        } else {
          $hrefEdit = '/users/profile/1';
        }
        break;
    case 'edit': 
        $title = __('Edit');
        $disabled = false;
        $aTextBack = __('Cancel');
        $hrefBack = '/users/view/' . $user->id;
        break;
    case 'view':
    default:
        $title = __('View');
        $viewDates = true;
        $hrefEdit = '/users/edit/' . $user->id;
        $hrefBack = '/users/index';
        $aTextBack = __('Back');
        break;    
}
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
  </div>
  <?= $this->Form->create($user,['type' => 'file']) ?>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-3">
        <div class="text-center">
          <img id="avatar" src="<?= empty($user->photo)?'/img/user.png':DS.'files'.DS.'Users'.DS.'photo'.DS.$user->photo?>" class="avatar rounded-circle img-thumbnail" alt="avatar" style="max-width: 210px">
          <?php if (!$disabled) { echo $this->Form->control('photo', ['type' => 'file', 'label' => false, 'required' => false]); }?>
        </div></hr><br>
      </div>
      <div class="col-sm-9">    
        <div class="form-group">
          <div class="col-xs-6">
            <label for="username"><h4><?=__('Username')?></h4></label>
            <?= $this->Form->control('username',['class' => 'form-control', 'name' => 'username', 'disabled' => $disabled, 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="name"><h4><?=__('Name')?></h4></label>
            <?= $this->Form->control('name',['class' => 'form-control', 'name' => 'name', 'disabled' => $disabled, 'label' => false]);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="email"><h4><?=__('Email')?></h4></label>
            <?= $this->Form->control('email',['class' => 'form-control', 'name' => 'email', 'disabled' => $disabled, 'label' => false]);?>
          </div>
        </div>
        <?php if (!$profile):?>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="email"><h4><?=__('Type')?></h4></label>
            <?= $this->Form->control('type_id',['class' => 'form-control', 'name' => 'type_id', 'disabled' => $disabled, 'options' => $types, 'empty' => true, 'label' => false]);?>
          </div>
        </div>
        <?php endif;?>
        
        
        <?php if ($viewDates):?>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="created"><h4><?=__('Created')?></h4></label>
            <?= $this->Form->control('created',['class' => 'form-control', 'name' => 'created', 'disabled' => $disabled, 'label' => false, 'type' => 'text']);?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="modified"><h4><?=__('Modified')?></h4></label>
            <?= $this->Form->control('modified',['class' => 'form-control', 'name' => 'modified', 'disabled' => $disabled, 'label' => false, 'type' => 'text']);?>
          </div>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class="card-footer card-footer-fixed">
    
    <?php  
      if ($disabled) {
        echo $this->Html->link(__('Edit'),$hrefEdit,['class' => 'btn btn-warning float-right']);
        
        if ($profile) {
          echo $this->Html->link('<i class="fas fa-key"></i> ' . __('Change Password'),'/users/password',['class' => 'btn btn-warning float-right space-right', 'escape' => false]);
        }
      } else {
        echo $this->Form->button(__('Submit'), ['class' => 'btn btn-warning float-right']);
      }
      if (!empty($hrefBack)) {
        echo $this->Html->link($aTextBack,$hrefBack,['class' => 'btn btn-secondary float-right space-right']);
      }
    ?>
  </div>
  <?= $this->Form->end() ?>
</div>

<?php if (!$disabled) { echo $this->Html->script('/js/user-helper.js', ['block' => true]);}?>
