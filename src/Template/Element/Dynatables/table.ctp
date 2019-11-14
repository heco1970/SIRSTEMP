<div class="table-responsive">
  <table class="table table-bordered" id="<?=$dId?>">
    <thead>
      <tr>
        <?php foreach ($elements as $element => $options):?>
          <th data-dynatable-column="<?=$element?>"><?=$options['label']?></th>
        <?php endforeach;?>
        <?php if($actions):?>
          <th data-dynatable-no-sort="true">Actions</th>
        <?php endif;?>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
