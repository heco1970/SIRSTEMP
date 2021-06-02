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
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.1.1/dist/css/autoComplete.min.css'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">                
                <label for="nmrPessoa" style="margin-right: 30px; padding-top: 8px;">ID da pessoa</label>                        
                <?php echo $this->Form->control('nmrPessoa', ['id' => 'nmrPessoaID','label' => false, 'class' => 'form-control', 'style' => 'width: 65%;', 'disabled' => true]); ?>
                
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

            <div class="autoComplete_wrapper">
                <input type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" id="autoComplete">
            </div>

            <div class="selection" style="display: none;"></div>

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
<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.1.1/dist/autoComplete.min.js"></script>
<script>
    const autoCompleteJS = new autoComplete({
        data: {
            src: async () => {
            try {
                // Loading placeholder text
                document
                .getElementById("autoComplete")
                .setAttribute("placeholder", "Loading...");
                // Fetch External Data Source
                const source = await fetch(
                    "https://tarekraafat.github.io/autoComplete.js/demo/db/generic.json"
                );
                const data = await source.json();
                // Post Loading placeholder text
                document
                .getElementById("autoComplete")
                .setAttribute("placeholder", autoCompleteJS.placeHolder);
                // Returns Fetched data
                return data;
            } catch (error) {
                return error;
            }
            },
            keys: ["food", "cities", "animals"],
            cache: true,
            filter: (list) => {
            // Filter duplicates
            // incase of multiple data keys usage
            const filteredResults = Array.from(
                new Set(list.map((value) => value.match))
            ).map((food) => {
                return list.find((value) => value.match === food);
            });

            return filteredResults;
            }
        },
        placeHolder: "Search for Food & Drinks!",
        resultsList: {
            element: (list, data) => {
            const info = document.createElement("p");
            if (data.results.length > 0) {
                info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
            } else {
                info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
            }
            list.prepend(info);
            },
            noResults: true,
            maxResults: 15,
            tabSelect: true
        },
        resultItem: {
            element: (item, data) => {
            // Modify Results Item Style
            item.style = "display: flex; justify-content: space-between;";
            // Modify Results Item Content
            item.innerHTML = `
            <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                ${data.match}
            </span>
            <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);">
                ${data.key}
            </span>`;
            },
            highlight: true
        },
        events: {
            input: {
            focus: () => {
                if (autoCompleteJS.input.value.length) autoCompleteJS.start();
            }
            }
        }
        });

    autoCompleteJS.input.addEventListener("selection", function (event) {
        const feedback = event.detail;
        autoCompleteJS.input.blur();
        // Prepare User's Selected Value
        const selection = feedback.selection.value[feedback.selection.key];
        // Render selected choice to selection div
        document.querySelector(".selection").innerHTML = selection;
        // Replace Input value with the selected value
        autoCompleteJS.input.value = selection;
        // Console log autoComplete data feedback
        console.log(feedback);
    });
</script>

<script>    

    function randomIDGen() {
        var x = Math.floor(Math.random() * 90000) + 10000;;
        var generatedNum = document.getElementById('nmrPessoaID');
        generatedNum.setAttribute('value',x);
    }

    window.onload = randomIDGen;

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