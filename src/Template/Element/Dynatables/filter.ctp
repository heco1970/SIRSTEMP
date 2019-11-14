<div id="<?=$dId?>-div" class="card shadow mb-2 hidden">
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div id="<?=$dId?>-search">
              <div class="row">
                <?php $baseArray = ['class' => 'form-control'];?>
                <?php foreach ($elements as $element => $options):?>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control($element,array_merge($baseArray,$options));?>
                    </div>
                  </div>
                <?php endforeach;?>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
