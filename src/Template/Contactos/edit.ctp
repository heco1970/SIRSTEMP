<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<style>
    .hide {
        display: none;
    }

    .error {
        border: solid 1px red;
        color: red;
    }
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Contacto de ') ?> <?= h($pessoa->nome) ?></h6>
    </div>
    <div class='ml-4 mt-4 mr-4'>
        <?= $this->Form->create($contacto) ?>

        <div id='my-form-body'>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <?= $this->Form->control('nome', ['label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= $this->Form->control('email', ['type' => 'email', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="localidade">Localidade</label>
                        <?= $this->Form->control('localidade', ['label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <?= $this->Form->control('telefone', ['id' => 'campoTelefone', 'label' => false, 'class' => "form-control"]); ?>
                        <span id="valid-msg1" class="hide">✓ Valid</span>
                        <span id="error-msg1" class="hide"></span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="telemovel">Telemóvel</label>
                        <?= $this->Form->control('telemovel', ['id' => 'campoTelemovel', 'label' => false, 'class' => "form-control"]); ?>
                        <span id="valid-msg2" class="hide">✓ Valid</span>
                        <span id="error-msg2" class="hide"></span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <?= $this->Form->control('fax', ['id' => 'campoFax', 'label' => false, 'class' => "form-control"]); ?>
                        <span id="valid-msg3" class="hide">✓ Valid</span>
                        <span id="error-msg3" class="hide"></span>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <?= $this->Form->control('descricao', ['type' => 'textarea', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <?= $this->Form->control('estado', ['options' => ['0' => 'Não Ativo', '1' => 'Ativo'], 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/pessoas/view/<?= h($contacto->pessoa_id) ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    var input1 = document.querySelector("#campoTelefone"),
        errorMsg1 = document.querySelector("#error-msg1"),
        validMsg1 = document.querySelector("#valid-msg1"),
        input2 = document.querySelector("#campoTelemovel"),
        errorMsg2 = document.querySelector("#error-msg2"),
        validMsg2 = document.querySelector("#valid-msg2"),
        input3 = document.querySelector("#campoFax"),
        errorMsg3 = document.querySelector("#error-msg3"),
        validMsg3 = document.querySelector("#valid-msg3");

    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    var iti1 = window.intlTelInput(input1, {
        utilsScript: "/js/utils.js",
        initialCountry: "pt",
        hiddenInput: "telefone_completo",
    });
    var iti2 = window.intlTelInput(input2, {
        utilsScript: "/js/utils.js",
        initialCountry: "pt",
        hiddenInput: "telemovel_completo",
    });
    var iti3 = window.intlTelInput(input3, {
        utilsScript: "/js/utils.js",
        initialCountry: "pt",
        hiddenInput: "fax_completo",
    });

    var reset1 = function() {
        input1.classList.remove("error");
        errorMsg1.innerHTML = "";
        errorMsg1.classList.add("hide");
        validMsg1.classList.add("hide");
    };
    var reset2 = function() {
        input2.classList.remove("error");
        errorMsg2.innerHTML = "";
        errorMsg2.classList.add("hide");
        validMsg2.classList.add("hide");
    };
    var reset3 = function() {
        input3.classList.remove("error");
        errorMsg3.innerHTML = "";
        errorMsg3.classList.add("hide");
        validMsg3.classList.add("hide");
    };

    // on blur: validate
    input1.addEventListener('blur', function() {
        reset1();
        if (input1.value.trim()) {
            if (iti1.isValidNumber()) {
                validMsg1.classList.remove("hide");
            } else {
                input1.classList.add("error");
                var errorCode = iti1.getValidationError();
                errorMsg1.innerHTML = errorMap[errorCode];
                errorMsg1.classList.remove("hide");
            }
        }
    });
    input2.addEventListener('blur', function() {
        reset2();
        if (input2.value.trim()) {
            if (iti2.isValidNumber()) {
                validMsg2.classList.remove("hide");
            } else {
                input2.classList.add("error");
                var errorCode = iti2.getValidationError();
                errorMsg2.innerHTML = errorMap[errorCode];
                errorMsg2.classList.remove("hide");
            }
        }
    });
    input3.addEventListener('blur', function() {
        reset3();
        if (input3.value.trim()) {
            if (iti3.isValidNumber()) {
                validMsg3.classList.remove("hide");
            } else {
                input3.classList.add("error");
                var errorCode = iti3.getValidationError();
                errorMsg3.innerHTML = errorMap[errorCode];
                errorMsg3.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input1.addEventListener('change', reset1);
    input1.addEventListener('keyup', reset1);

    input2.addEventListener('change', reset2);
    input2.addEventListener('keyup', reset2);

    input3.addEventListener('change', reset3);
    input3.addEventListener('keyup', reset3);
</script>