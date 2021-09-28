<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>

<h1 class="h3 mb-2 text-gray-800"><?= __('Registo de Pedidos') ?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/pedidos/add"><i class="fas fa-plus"></i></a>
        <?= $this->Html->link(
            '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
            ['action' => 'xls'],
            ['id' =>'xlsbutton', 'escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right']
        )
        ?>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i
                class="fas fa-filter"></i></button>
    </div>
</div>

<?php
$dynElems =
    [
        'id' => ['label' => __('ID Pedido')],
        'processo' => ['label' => __('Processo')],
        'pessoa' => ['label' => __('Nome Pessoa')],
        'equiparesponsavel' => ['label' => __('Equipa Responsável'),'options' => $teams, 'empty' => ' '],
        'pedidostype' => ['label' => __('Tipo de Pedido de código'),'options' => $PedidosTypes, 'empty' => ' '],
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems =
    ['id' => ['label' => __('ID')]] +
    ['processo' => ['label' => __('Processo')]] +
    ['pessoa' => ['label' => __('Pessoa')]] +
    ['datarecepcao' => ['label' => __('Data de Receção')]] +
    ['equiparesponsavel' => ['label' => __('Equipa Responsável')]] +
    ['state' => ['label' => __('Estado')]] +
    ['datatermoprevisto' => ['label' => __('Data termo previsto')]] +
    ['dataefectivatermo' => ['label' => __('Data termo efetivo')]]

?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Listagem de Pedidos') ?></h6>
    </div>
    <div class="card-body">
        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
</div>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text']); ?>

<?= $this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]); ?>
<?= $this->Html->script('/js/dynatable-helper.js', ['block' => true]); ?>

<?php $this->start('scriptBottom') ?>
<script>

var e = jQuery.Event("keypress");
e.which = 13; // Enter

$('#xlsbutton').click(function() {
    createCookie(
        "Filtro",
        document.getElementById("id").value,
        document.getElementById("processo").value,
        document.getElementById("pessoa").value,
        document.getElementById("equiparesponsavel").value,
        document.getElementById("pedidostype").value,
        "1"
    );
});

$('#dynatable-filter').click(function() {
    $('#dynatable-filter').trigger(e);
    emptyCookie();
});

function emptyCookie() {
    createCookie(
        "Filtro",
        document.getElementById("id").value = '',
        document.getElementById("processo").value = '',
        document.getElementById("pessoa").value = '',
        document.getElementById("equiparesponsavel").value = '',
        document.getElementById("pedidostype").value = '',
        "1"
    );
}

$(document).ready(function() {
    var writers = {
        ação: function(row) {
            var view = '<a class="btn btn-info mr-1" href="/pedidos/view/' + row.id +
                '" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>'
            var edit = '<a class="btn btn-warning mr-1" href="/pedidos/edit/' + row.id +
                '" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>'
            var dele = '<a class="btn btn-danger" onclick="return confirm(' + "'Quer mesmo apagar?'" +
                ')" href="/pedidos/delete/' + row.id +
                'data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>'

            return '<div class="btn-group btn-group-sm" role="group">' + view + edit + dele + '</div>';
        }
    }
    createDynatable("#dynatable", "/pedidos/", {
        created: -1
    }, writers);

    document.getElementById('datarecepcao').type = 'date';
    document.getElementById('datatermoprevisto').type = 'date';
    document.getElementById('dataefectivatermo').type = 'date';

    document.getElementById("createdfirst").onchange = function() {
        if (document.getElementById('createdfirst').value != "") {
            datefirst = new Date(document.getElementById('createdfirst').value);
            datefirst.setDate(datefirst.getDate() + 1)
            document.getElementById('createdlast').min = datefirst.toISOString().split("T")[0];
        } else {
            document.getElementById('createdlast').min = null;
        }
    };

    document.getElementById("createdlast").onchange = function() {
        if (document.getElementById('createdlast').value != "") {
            datelast = new Date(document.getElementById('createdlast').value);
            datelast.setDate(datelast.getDate() - 1)
            document.getElementById('createdfirst').max = datelast.toISOString().split("T")[0];
        } else {
            document.getElementById('createdfirst').max = null;
        }
    };

    deleteCookie("Filtro");
    createCookie("Filtro", "", "", "", "", "", "1");
});

function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
}

function createCookie(name, valuePessoa, valueNome, valueCC, valueNIF, valueDatanascimento, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        valuePessoa + "," + valueNome + "," + valueCC + "," + valueNIF + "," + valueDatanascimento +
        expires + "; path=/";
}
</script>
<?php $this->end(); ?>