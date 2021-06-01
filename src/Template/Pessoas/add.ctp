<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<style>
    #distritos,#concelhos, #freguesias {
  /* for Firefox */
  -moz-appearance: none;
  /* for Chrome */
  -webkit-appearance: none;
}

</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">                
                <label for="nmrPessoa" style="margin-right: 30px; padding-top: 8px;">ID da pessoa</label>                        
                <?php echo $this->Form->control('nmrPessoa', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;']); ?>
                
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
                        <label for="estadocivil_id">Estado Civil</label>
                        <?php echo $this->Form->control('estadocivil_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $estadocivils, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="genero_id">Género</label>
                        <?php echo $this->Form->control('genero_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $generos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pai_id">Nacionalidade</label>
                        <?php echo $this->Form->control('pai_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>
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

                        <div class="input number" style="width: 20%; margin-left: 2%; margin-right: 5%;">
                            <?php echo $this->Form->control('codigo_postal', ['id' => 'codigo_postal', 'type' => 'number', 'max' => 9999, 'min'=>1,'label' => false, 'class' => 'form-control', 'required']); ?>
                        </div>                  
                        
                        <div class="input number" style="width: 15%;">    
                            <?php echo $this->Form->control('codigo_postal1', ['id' => 'codigo_postal1', 'type' => 'number', 'max' => 999, 'min'=>1,'label' => false, 'class' => 'form-control', 'required']); ?>                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="distrito">Distrito</label>
                        <?php echo $this->Form->control('distrito', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $distritos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="concelho">Concelho</label>
                        <?php echo $this->Form->control('concelho', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $concelhos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="freguesia">Freguesia</label>
                        <?php echo $this->Form->control('freguesia', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $freguesias, 'class' => 'form-control']); ?>
                    </div>
                </div>                
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="hea">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['id' => 'dataNasc','label' => false, 'class' => 'form-control', 'type' => 'date', 'onChange' => 'submitBday()']); ?>                        
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
                        <?php echo $this->Form->control('cc', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nif">Número de Contribuinte</label>
                        <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control', 'type' => 'text']); ?>

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
                <?php echo $this->Form->control('nomeContact', ['label' => false, 'class' => 'form-control']); ?>
                
                <label for="tel" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;','type' => 'text']); ?>                
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">                
            <label for="nomeContact2" style="margin-right: 30px; padding-top: 8px;">Nome</label>                        
                <?php echo $this->Form->control('nomeContact2', ['label' => false, 'class' => 'form-control']); ?>
                
                <label for="tel2" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel2', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;','type' => 'text']); ?>             
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">                
            <label for="nomeContact3" style="margin-right: 30px; padding-top: 8px;">Nome</label>                        
                <?php echo $this->Form->control('nomeContact3', ['label' => false, 'class' => 'form-control']); ?>
                
                <label for="tel3" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel3', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;','type' => 'text']); ?>            
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
<script>

    // Código usado em: http://www.java2s.com/Tutorials/Javascript/Javascript_Form_How_to/Date_Input/Get_the_age_from_input_type_date_.htm
    function submitBday() {  
    
        var Bdate = document.getElementById('dataNasc').value;
        var Bday = +new Date(Bdate);
        var idade = ~~ ((Date.now() - Bday) / (31557600000));
        var theBday = document.getElementById('idade');
        theBday.setAttribute('value',idade);
    }    

    $('document').ready(function() {
        $('#codigo_postal1').keyup(function() {

            var searchkey = $('#codigo_postal').val();
            var searchkey1 = $('#codigo_postal1').val();
            searchTags(searchkey, searchkey1);
        });
        $('#codigo_postal').keyup(function() {

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
    });
</script>