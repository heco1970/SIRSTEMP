<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Processos') ?></h6>
    </div>
    <?= $this->Form->create($processo) ?>
    <div class='ml-4 mt-4 mr-4'>
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
                        <?php echo $this->Form->control('natureza', ['label' => false, 'class' => 'form-control', 'required' => true]); ?>
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
                        <?php echo $this->Form->control('nip', ['label' => false, 'class' => 'form-control', 'required' => true]); ?>
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
                        <?php echo $this->Form->control('observacoes', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>
        <a href="/processos/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
