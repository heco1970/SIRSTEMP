<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

    <h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Pedidos')?></h1>

    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <a class="btn btn-success btn-circle btn-lg" href="/pedidos/add"><i class="fas fa-plus"></i></a>
            <?= $this->Html->link(
                '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
                ['action' => 'xls'],
                ['escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right']) 
            ?>
            <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
        </div>
    </div>


<?php
$dynElems =
    [
        'id' => ['label' => __('Id')],
        'nome' => ['label' => __('Nome')],
        'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
        'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['id' => ['label' => __('Id')]] + 
            ['pessoa' => ['label' => __('Nome')]] +
            ['created' => ['label' => __('Data de Criação')]];
?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Pedidos')?></h6>
        </div>
        <div class="card-body">
            <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
        </div>
    </div>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text' ]); ?>

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
    <script>
        $(document).ready(function() {
            var writers = {
                actions: function(row) {
                    var view = '<a class="btn btn-info" href="/pedidos/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'

                    return '<div class="btn-group btn-group-sm" role="group">' + view +  '</div>';
                }
            }
            createDynatable("#dynatable","/pedidos/",{created: -1}, writers);

            document.getElementById('createdfirst').type = 'date';
            document.getElementById('createdlast').type = 'date';

            document.getElementById("createdfirst").onchange = function() {
                if(document.getElementById('createdfirst').value != ""){
                datefirst = new Date(document.getElementById('createdfirst').value);
                datefirst.setDate(datefirst.getDate() + 1)
                document.getElementById('createdlast').min = datefirst.toISOString().split("T")[0];
                }
                else{
                document.getElementById('createdlast').min = null;
                }
            };

            document.getElementById("createdlast").onchange = function() {
                if(document.getElementById('createdlast').value != ""){
                datelast = new Date(document.getElementById('createdlast').value);
                datelast.setDate(datelast.getDate() - 1)
                document.getElementById('createdfirst').max = datelast.toISOString().split("T")[0];
                }
                else{
                document.getElementById('createdfirst').max = null;
                }
            };

            deleteCookie("Filtro");
            createCookie("Filtro", "", "","1");

            // function removeElement(url)
        });

        document.getElementById("id").onkeyup = function() {
            createCookie("Filtro", document.getElementById("id").value , document.getElementById("nome").value, "1"); 
        };

        document.getElementById("nome").onkeyup = function() {
            createCookie("Filtro", document.getElementById("id").value , document.getElementById("nome").value, "1");         
        };

        function deleteCookie(name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
        }
        
        function createCookie(name, valueId, valueNome, days) { 
            var expires; 
            
            if (days) { 
                var date = new Date(); 
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
                expires = "; expires=" + date.toGMTString(); 
            } 
            else { 
                expires = ""; 
            } 
            
            document.cookie = escape(name) + "=" +
                valueId + "," + valueNome
                + expires + "; path=/"; 
        } 

    </script>
<?php $this->end(); ?>
