<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<div class="alert alert-success" role="alert">
    Novo Registo de Pessoa
</div>
<?= $this->Form->create(Null, ['type' => 'POST', 'id' => 'formulario']) ?>

<div id='my-form-body'>

    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="nome">Nome da Pessoa</label>
                <input type="text" class="form-control" name="nome" id="nome">

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="nomepai">Nome do Pai</label>
                <input type="text" class="form-control" name="nomepai" id="nomepai">

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="nomemaae">Nome da Mâe</label>
                <input type="text" class="form-control" name="nomemae" id="nomemae">

            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="id_estadocivil">Estado Civil</label>
                <select class="form-control" name="id_estadocivil" id="id_estadocivil">
                    <option value="1">Casado</option>
                    <option value="2">União de Facto</option>
                    <option value="3">Solteiro</option>
                    <option value="4">Viuvo</option>
                </select>

            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="id_genero">Genero</label>
                <select class="form-control" name="id_genero" id="id_genero">
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                    <option value="3">Outro</option>

                </select>

            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="pais_id">Nacionalidade</label>
                <select class="form-control" name="pais_id" id="pais_id">
                <?php foreach ($pais as $pai): ?>
                    <option value="<?= $pai->id ?>"><?= $pai->paisNome ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">


        <div class="col">
            <div class="form-group">
                <label for="hea">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="cc">Cartão de Cidadão</label>
                <input type="text" class="form-control" name="cc" id="cc">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="nif">Numero de Contribuinte</label>
                <input type="text" class="form-control" name="nif" id="nif">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="outroidentifica">Outra Identificação</label>
                <input type="text" class="form-control" name="outroidentifica" id="outroidentifica ">
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="nome">Observações</label>

                <input type="text" class="form-control" name="observacoes" id="observacoes">

            </div>
        </div>
    </div>


</div>
<button class="btn btn-success btn-lg" type="submit">GRAVAR</button>

<?= $this->Form->end() ?>


