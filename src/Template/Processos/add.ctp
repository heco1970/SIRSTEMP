<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Processo $processo
 */
?>


<?= $this->Form->create(Null, ['type' => 'POST', 'id' => 'formulario']) ?>

<div id='my-form-body'>

    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="entidade_id">Entidade Judicial</label>
                <select class="form-control" name="entidadejudiciai_id" id="entidadejudiciai_id">
                    <?php foreach ($entidades as $entidade): ?>
                        <option value="<?= $entidade->id ?>"><?= $entidade->descricao ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="unit_id">Unidade Orgânica</label>
                <select class="form-control" name="unit_id" id="unit_id">
                    <?php foreach ($units as $unit): ?>
                        <option value="<?= $unit->id ?>"><?= $unit->designacao ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="natureza">Natureza</label>
                <input type="text" class="form-control" name="natureza" id="natureza">
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="dataconclusao">Data de Conclusão</label>
                <input type="date" class="form-control" name="dataconclusao" id="dataconclusao">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="state_id">Estado</label>
                <select class="form-control" name="state_id" id="state_id">
                    <?php foreach ($states as $state): ?>
                        <option value="<?= $state->id ?>"><?= $state->designacao ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="observacoes">Observações</label>
                <input type="textarea" class="form-control" name="observacoes" id="observacoes">
            </div>
        </div>
    </div>

</div>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

