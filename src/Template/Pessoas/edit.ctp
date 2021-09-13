<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<style>
#distritos,
#concelhos,
#freguesias {
    /* for Firefox */
    -moz-appearance: none;
    /* for Chrome */
    -webkit-appearance: none;
}
</style>
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="id" style="margin-right: 30px; padding-top: 8px;">ID da pessoa</label>
                <?php echo $this->Form->control('id', ['type'=>'text', 'label' => false,'disabled' => true, 'class' => 'form-control', 'style' => 'width: 65%;']); ?>
                <label for="localDos" style="margin-right: 30px; padding-top: 8px;">Localização do dossier</label>
                <?php echo $this->Form->control('localDos', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;','type' => 'text']); ?>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome da Pessoa</label>
                        <?php echo $this->Form->control('nome', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome_alt">Nome Alternativo</label>
                        <?php echo $this->Form->control('nome_alt', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomepai">Nome do Pai</label>
                        <?php echo $this->Form->control('nomepai', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomemaae">Nome da Mãe</label>
                        <?php echo $this->Form->control('nomemae', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_estadocivil">Estado Civil</label>
                        <?php echo $this->Form->control('estadocivil_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $estadocivils, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_genero">Género</label>

                        <?php echo $this->Form->control('genero_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $generos, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pais_id">Nacionalidade</label>

                        <?php echo $this->Form->control('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="morada">Morada</label>
                        <?php echo $this->Form->control('morada', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="codigo_postal" style="margin-left: 5px;">Código Postal</label>
                    <div class="form-row">
                        <div class="input number" style="width: 25%; margin-left: 2%; margin-right: 5%;">
                            <?php echo $this->Form->number('codigo_postal', ['id' => 'codigo_postal', 'value' => h($pessoa->codigos_postai->NumCodigoPostal), 'max' => 9999, 'min' => 1, 'label' => false, 'class' => 'form-control', 'required']); ?>
                        </div>
                        <div class="input number" style="width: 20%;">
                            <?php echo $this->Form->number('codigo_postal1', ['id' => 'codigo_postal1', 'value' => h($pessoa->codigos_postai->ExtCodigoPostal), 'max' => 999, 'min' => 1, 'label' => false, 'class' => 'form-control', 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="distrito">Distrito</label>
                        <?php echo $this->Form->control('distritos', ['id' => 'distrito_1', 'empty'=>' ', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $distritos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="concelho">Concelho</label>
                        <?php echo $this->Form->control('concelhos', ['id' => 'concelho_1', 'empty'=>' ', 'label' => false, 'type' => 'select', 'multiple' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="freguesia">Freguesia</label>
                        <?php echo $this->Form->control('codigos_postai_id', ['id'=> 'freguesia_1','type'=>'select','label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="col">
                    <div class="form-group">
                        <label for="hea">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['id' => "dataNasc", 'label' => false, 'value'=>h($pessoa->data_nascimento->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date', 'onChange' => 'submitBday()']); ?>
                    </div>
                </div>
                <div class="col">
                    <div id="container" style="padding-left: 30%;">
                        <label for="age">Idade</label>
                        <?php echo $this->Form->control('age', ['id' => "idade",'label' => false, 'class' => 'form-control', 'style' => 'width: 50%;', 'disabled' => true]); ?>
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="cc">Cartão de Cidadão</label>
                        <?php echo $this->Form->control('cc', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'maxLength' => '9']); ?>
                        <div id='ccError'></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nif">Número de Contribuinte</label>
                        <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'maxLength' => '9']); ?>
                        <div id='nifError'></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="outroidentifica">Outra Identificação</label>
                        <?php echo $this->Form->control('outroidentifica', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>

            <h5 style="color: #0000009c;">Contacto</h5>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact', ['label' => false, 'class' => 'form-control','style' => 'width: 450px;']); ?>

                <label for="tel" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel', ['id' => 'telefone1', 'name' => 'telefone1','label' => false, 'class' => 'form-control', 'style' => 'width: 80%;','type' => 'text']); ?>
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact2" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact2', ['label' => false, 'class' => 'form-control','style' => 'width: 450px;']); ?>

                <label for="tel2" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel2', ['id' => 'telefone2', 'name' => 'telefone2','label' => false, 'class' => 'form-control', 'style' => 'width: 80%;','type' => 'text']); ?>
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact3" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact3', ['label' => false, 'class' => 'form-control','style' => 'width: 450px;']); ?>

                <label for="tel3" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel3', ['id' => 'telefone3', 'name' => 'telefone3','label' => false, 'class' => 'form-control', 'style' => 'width: 80%;','type' => 'text']); ?>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <?php echo $this->Form->control('observacoes', ['type' => 'textarea','label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success float-right"]) ?>
        <a href="/pessoas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
    integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
$.fn.select2.defaults.set("theme", "bootstrap");

var selData = 0;

$('#freguesia_1').select2({
    ajax: {
        url: function(params) {
            return '/Pessoas/FregAutoComplete/' + selData;
        },
        dataType: 'json',
        delay: 250,
    }
});

$('#cc').change(function() {
    if ($('#cc').val().length < 9) {
        $("#ccError").html("O cartão de cidadão tem que ter 9 dígitos.").addClass("error-msg");
    } else {
        $("#ccError").html("").removeClass("error-msg");
    }
});

$('#nif').change(function() {

    if (validateNIF($('#nif').val())) {
        $("#nifError").html("").removeClass("error-msg");
    } else {
        $("#nifError").html("Número de Contribuinte inválido.").addClass("error-msg");
    }
});

function validateNIF(nif) {
    if (!['1', '2', '3', '5', '6', '8'].includes(nif.substr(0, 1)) &&
        !['45', '70', '71', '72', '77', '79', '90', '91', '98', '99'].includes(nif.substr(0, 2)))
        return false;

    let total = nif[0] * 9 + nif[1] * 8 + nif[2] * 7 + nif[3] * 6 + nif[4] * 5 + nif[5] * 4 + nif[6] * 3 + nif[7] * 2;

    let modulo11 = total - parseInt(total / 11) * 11;
    let comparador = modulo11 == 1 || modulo11 == 0 ? 0 : 11 - modulo11;

    return nif[8] == comparador

}

function submitBday() {

    var Bdate = document.getElementById('dataNasc').value;
    var Bday = +new Date(Bdate);
    var idade = ~~((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('idade');
    theBday.setAttribute('value', idade);
}

$('document').ready(function() {

    $("#distrito_1").change(function(event) {
        var data = $(this).val();
        $.ajax({
            //method: 'ajax',
            url: '/Pessoas/concelhosByDistritos',
            dataType: 'json',
            data: {
                keyword: data,
            },
            success: function(response) {
                $('#concelho_1').html("");
                //response = JSON.parse(response);
                //console.log(response);
                $('#concelho_1').append($("<option>").attr('value', "1").text(" "));
                response.forEach(element => $('#concelho_1').append($("<option>").attr(
                    'value', element.id).text(element.Designacao)));
            }
        });
    })

    $("#concelho_1").change(function(event) {
        var data = $(this).val();
        selData = data;
    })

    $(function() {
        var Bdate = document.getElementById('dataNasc').value;
        var Bday = +new Date(Bdate);
        var idade = ~~((Date.now() - Bday) / (31557600000));
        var theBday = document.getElementById('idade');
        theBday.setAttribute('value', idade);
    });


    $('#codigo_postal1').keyup(function() {

        var searchkey = $('#codigo_postal').val();
        var searchkey1 = $('#codigo_postal1').val();
        searchTags(searchkey, searchkey1);
    });

    function searchTags(keyword, keyword1) {
        var data = keyword;
        var data1 = keyword1;
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Pessoas', 'action' => 'Search']); ?>",
            data: {
                keyword: data,
                keyword1: data1,

            },

            success: function(response) {
                $('#distrito').html(response);
            }
        });
    };

    $('#codigo_postal1').trigger("keyup");

    $('#telefone1').keypress(function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
        e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
    });

    $('#telefone2').keypress(function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
        e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
    });

    $('#telefone3').keypress(function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
        e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
    });

});
</script>