<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Verbetes')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/verbetes/add"><i class="fas fa-plus"></i></a>
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
        'pessoa' => ['label' => __('Pessoa')],
        'criacao' => ['label' => __('Data Criação')],
        'distribuicao' => ['label' => __('Data Distribuição')],
        'efectivo' => ['label' => __('Data Inicio Efectivo')],
        'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
        'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['pessoa' => ['label' => __('Pessoa')]] +
            ['criacao' => ['label' => __('Data Criação')]] +
            ['distribuicao' => ['label' => __('Data Distribuição')]] +
            ['efectivo' => ['label' => __('Data Inicio Efectivo')]] +
            ['created' => ['label' => __('Data de Criação (original)')]];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Verbetes')?></h6>
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
            ação: function(row) {
                var view = '<a class="btn btn-info" href="/verbetes/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view +  '</div>';
            }
        }
        createDynatable("#dynatable","/verbetes/",{created: -1}, writers);

        document.getElementById('createdfirst').type = 'date';
        document.getElementById('createdfirst').max = new Date().toISOString().split("T")[0];
        document.getElementById('createdlast').type = 'date';
        document.getElementById('createdlast').min = new Date().toISOString().split("T")[0];

        deleteCookie("Filtro");
        createCookie("Filtro", "", "", "", "","1");

        // function removeElement(url)
    });

    document.getElementById("pessoa").onkeyup = function() {
        createCookie("Filtro", document.getElementById("id").value, document.getElementById("pessoa").value, document.getElementById("criacao").value, document.getElementById("distribuicao").value, document.getElementById("efectivo").value, "1");          
    };

    document.getElementById("criacao").onkeyup = function() {
        createCookie("Filtro", document.getElementById("id").value, document.getElementById("pessoa").value, document.getElementById("criacao").value, document.getElementById("distribuicao").value, document.getElementById("efectivo").value, "1");         
    };

    document.getElementById("distribuicao").onkeyup = function() {
        createCookie("Filtro", document.getElementById("id").value, document.getElementById("pessoa").value, document.getElementById("criacao").value, document.getElementById("distribuicao").value, document.getElementById("efectivo").value, "1");         
    };

    document.getElementById("efectivo").onkeyup = function() {
        createCookie("Filtro", document.getElementById("id").value, document.getElementById("pessoa").value, document.getElementById("criacao").value, document.getElementById("distribuicao").value, document.getElementById("efectivo").value, "1");        
    };

    function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
    }
    
    function createCookie(name, valuePessoa, valueCria, valueDis, valueEfe , days) { 
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
            valuePessoa + "," + valueCria + "," + valueDis + "," + valueEfe
            + expires + "; path=/"; 
    } 

</script>
<?php $this->end(); ?>
