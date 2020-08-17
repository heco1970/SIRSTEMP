
<div class="col-4">
    <div class="form-group">
        <label for="distritos">Distrito</label>

        <?php echo $this->Form->control('distritos', ['label' => false, 'class' => 'form-control', 'options' => $distritos, 'disabled']); ?>


    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="concelhos">Concelho</label>

        <?php echo $this->Form->control('concelhos', ['label' => false, 'class' => 'form-control', 'options' => $concelhos, 'disabled']); ?>


    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="freguesias">Freguesia</label>

        <?php echo $this->Form->control('freguesias', ['label' => false, 'class' => 'form-control', 'options' => $freguesias, 'disabled']); ?>


    </div>
</div>