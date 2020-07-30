<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <h3><?=  h($team->nome) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Nome') ?></th>
                <td><?=  h($team->nome) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($team->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Alterado') ?></th>
                <td><?= h($team->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
        </table>

        

        <h4>Utilizadores da equipa</h4>

        <table class="table">
            <?php foreach($team->users as $row) : ?>
                <tr>
                    <th scope="row"><?= __('Utilizadores') ?></th>
                    <td><?= h($row->username) ?></td>
                </tr>
            <?php endforeach ?>
        </table>



    <?php
        $dynElems = ['nome' => ['label' => __('Utilizador')]] +
            ['created' => ['label' => __('Data de Criação')]];
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=__('Utilizadores da equipa')?></h6>
        </div>
        <div class="card-body">
            <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => false]); ?>
        </div>
    </div>

    <?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text' ]); ?>

    <?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
    <?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

</div>

<?php $this->start('scriptBottom') ?>
<script>
    $(document).ready(function() {
        writers = {};
        createDynatable("#dynatable","/users-teams/",{created: -1}, writers);
    });
</script>
<?php $this->end(); ?>


    <object type="text/html" data="http://localhost:8765/users-teams/index?sorts%5Bcreated%5D=-1">
    </object>
    <iframe 
        sandbox="allow-scripts allow-forms allow-same-origin" 
        src="http://localhost:8765/users-teams/index?sorts%5Bcreated%5D=-1">
    </iframe>