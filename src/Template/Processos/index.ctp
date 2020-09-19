<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Processos')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/processos/add" title="Novo Processo"><i class="fas fa-plus"></i></a>
        <?= $this->Html->link(
            '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
            ['action' => 'xls'],
            ['escape' => false, 'title' => __('Obter listagem em formato excel'), 'class' => 'btn btn-primary btn-circle btn-lg float-right']) 
        ?>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2" title="Filtros"><i class="fas fa-filter"></i></button>
    </div>
</div>

<?php
$dynElems =
    [
        'processo' => ['label' => __('Id')],
        'natureza' => ['label' => __('Natureza'),'options' => $natureza, 'empty' => ' '],
        'nip' => ['label' => __('NIP')],
        'ultima' => ['label' => __('Ultima Alteração')],
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['processo' => ['label' => __('Id')]] +
            ['natureza' => ['label' => __('Natureza')]] +   
            ['nip' => ['label' => __('NIP')]] +
            ['ultima' => ['label' => __('Ultima Alteração')]] 
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Processos')?></h6>
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
                var view = '<a class="btn btn-info mr-1" href="/processos/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Detalhes')?>"><i class="far fa-eye fa-fw"></i></a>'
                var edit = '<a class="btn btn-warning mr-1" href="/processos/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Edit')?>"><i class="far fa-edit fa-fw"></i></a>'
                var dele = '<a class="btn btn-danger" onclick="return confirm('+"'Deseja mesmo apagar?'"+')" href="/processos/delete/' + row.id + 'data-toggle="tooltip" data-placement="top" title="<?=__('Delete')?>"><i class="fa fa-trash fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view + edit + dele + '</div>';
            }
        }
        createDynatable("#dynatable","/processos/",{created: -1}, writers);

        document.getElementById('createdfirst').type = 'date';
        document.getElementById('createdfirst').max = new Date().toISOString().split("T")[0];
        document.getElementById('createdlast').type = 'date';
        document.getElementById('createdlast').min = new Date().toISOString().split("T")[0];

        document.getElementById("createdfirst").onchange = function() {
            if(document.getElementById('createdfirst').value != ""){
            datefirst = new Date(document.getElementById('createdfirst').value);
            datefirst.setDate(datefirst.getDate() + 1)
            document.getElementById('createdlast').min = datefirst.toISOString().split("T")[0];
            }
            else{
            document.getElementById('createdlast').min = null;
            }
            createCookie("Filtro", document.getElementById("natureza").value, document.getElementById("nip").value, document.getElementById("createdfirst").value, document.getElementById("createdlast").value, "1");
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
            createCookie("Filtro", document.getElementById("natureza").value, document.getElementById("nip").value, document.getElementById("createdfirst").value, document.getElementById("createdlast").value, "1");
        };

        deleteCookie("Filtro");
        createCookie("Filtro", "", "", "", "","1"); 

        // function removeElement(url)
    });

    document.getElementById("natureza").onkeyup = function() {
        createCookie("Filtro", document.getElementById("natureza").value, document.getElementById("nip").value, document.getElementById("createdfirst").value, document.getElementById("createdlast").value, "1");
    };

    document.getElementById("nip").onkeyup = function() {
        createCookie("Filtro", document.getElementById("natureza").value, document.getElementById("nip").value, document.getElementById("createdfirst").value, document.getElementById("createdlast").value, "1");
    };

    function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
    }
    
    function createCookie(name, valueNat, valueNip, valueDatefirst, valueDatelast , days) { 
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
            valueNat + "," + valueNip + "," + valueDatefirst + "," + valueDatelast
            + expires + "; path=/"; 
    } 
</script>
<?php $this->end(); ?>
