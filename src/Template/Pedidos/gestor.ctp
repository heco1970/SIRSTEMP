
    <div class="form-group">
        <div class="col-xs-12">
            <label for="name">
                <h4><?= __('Gestor') ?></h4>
            </label>
            <?= $this->Form->control('gestor', ['id'=>'gestor','class' => 'form-control',  'label' => false, 'options'=>$gestor]); ?>
        </div>
    </div>
