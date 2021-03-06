<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);
$pessoaNome = "";
?>

<h1 class="h3 mb-2 text-gray-800"><?= __('Registo de Pessoas') ?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/pessoas/add"><i class="fas fa-plus"></i></a>
        <?= $this->Html->link(
            '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
            ['action' => 'xls'],
            ['id' => 'xlsbutton', 'escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right mr-2']
        )
        ?>
        <?= $this->Html->link(
            '<span class="fas fa-file-pdf"></span><span class="sr-only">' . __('pdf') . '</span>',
            ['action' => 'pdf'],
            ['id' => 'pdfbutton', 'escape' => false, 'title' => __('pdf'), 'class' => 'btn btn-primary btn-circle btn-lg float-right mr-2']
        )
        ?>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
    </div>
</div>

<?php
$dynElems =
    [
        'id' => ['label' => __('ID Pessoa')],
        'nome' => ['label' => __('Nome')],
        'cc' => ['label' => __('CC/BI')],
        'nif' => ['label' => __('NIF')],
        'datanascimento' => ['label' => __('Data de nascimento')],
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['id' => ['label' => __('Nº de pessoa')]] +
    ['nome' => ['label' => __('Nome')]] +
    ['cc' => ['label' => __('CC/BI')]] +
    ['nif' => ['label' => __('NIF')]] +
    ['datanascimento' => ['label' => __('Data de nascimento')]] +
    ['observacoes' => ['label' => __('Detalhes')]];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
</div>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text']); ?>
<div class="modal fade" id="theModal">
    <div class="modal-dialog modal-lg" style=" max-height:85%;  margin-top: 50px; max-width: 80%; margin-bottom:50px;">
        <div class="modal-content">
        </div>
    </div>
</div>

<?= $this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]); ?>
<?= $this->Html->script('/js/dynatable-helper.js', ['block' => true]); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php $this->start('scriptBottom') ?>

<script>
    var e = jQuery.Event("keypress");
    e.which = 13; // Enter

    $('#xlsbutton').click(function() {
        createCookie(
            "Filtro",
            document.getElementById("id").value,
            document.getElementById("nome").value,
            document.getElementById("cc").value,
            document.getElementById("nif").value,
            document.getElementById("datanascimento").value,
            "1"
        );
    });

    $('#pdfbutton').click(function() {
        createCookie(
            "Filtro",
            document.getElementById("id").value,
            document.getElementById("nome").value,
            document.getElementById("cc").value,
            document.getElementById("nif").value,
            document.getElementById("datanascimento").value,
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
            document.getElementById("nome").value = '',
            document.getElementById("cc").value = '',
            document.getElementById("nif").value = '',
            document.getElementById("datanascimento").value = '',
            "1"
        );
    }

    $(document).ready(function() {
        var writers = {
            ação: function(row) {
                var view = '<a class="btn btn-info mr-1" href="/pessoas/view/' + row.id +
                    '" data-toggle="tooltip" data-placement="top" title="<?= __('Detalhes') ?>"><i class="far fa-eye fa-fw"></i></a>'
                var edit = '<a class="btn btn-warning mr-1" href="/pessoas/edit/' + row.id +
                    '" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>'
                var dele = '<a class="btn btn-danger" onclick="return confirm(' + "'Quer mesmo apagar?'" +
                    ')" href="/pessoas/delete/' + row.id +
                    '" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view + edit + dele + '</div>';
            }
        }

        createDynatable("#dynatable", "/pessoas/", {
            created: -1
        }, writers);

        document.getElementById('datanascimento').type = 'date';
        document.getElementById('createdfirst').type = 'date';
        document.getElementById('createdlast').type = 'date';

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
        createCookie("Filtro", '', '', '', '', '', "1");

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