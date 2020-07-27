<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="alert alert-success" role="alert">
    Novo Registo de Contacto
</div>
<?= $this->Form->create(Null, ['type' => 'POST', 'id' => 'formulario']) ?>

<div id='my-form-body'>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="pessoa_id">Nome</label>
                <select class="form-control" name="pessoa_id" id="pessoa_id">
                    <?php foreach ($pessoas as $pessoa) : ?>
                        <option value="<?= $pessoa->id ?>"><?= $pessoa->nome ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
    </div>


    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="localidade">Localidade</label>
                <input type="text" class="form-control" name="localidade" id="localidade" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-4">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="number" class="form-control" name="telefone" id="telefone">

            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="number" class="form-control" name="fax" id="fax">

            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="telemovel">Telemóvel</label>
                <input type="number" class="form-control" name="telemovel" id="telemovel">

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao">

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="0">Não Ativo</option>
                    <option value="1">Ativo</option>
                </select>

            </div>
        </div>
    </div>
</div>

<button class="btn btn-success btn-lg" type="submit">GRAVAR</button>

<?= $this->Form->end() ?>