<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>

<h1 class="h3 mb-2 text-gray-800"><?= __('Registo Seguro Tutelar Educativo') ?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/tutelareducativos/add"><i class="fas fa-plus"></i></a>
        <!--
        <?= $this->Html->link(
            '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
            ['action' => 'xls'],
            ['id' => 'xlsbutton', 'escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right mr-2']
        )
        ?>
        -->
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
        'pedido' => ['label' => __('ID Pedido'), 'options' => $pedido, 'empty' => ' '],
        'equipa' => ['label' => __('Equipa'), 'options' => $equipa, 'empty' => ' '],
        'nome_jovem' => ['label' => __('Nome do Jovem')],
        'nif' => ['label' => __('NIF'), 'type' => 'number'],
        'designacao_entidade' => ['label' => __('Entidade beneficiária')],
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Listagem Seguro Titular Educativo') ?></h6>
    </div>
    <div class="card-body">
        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
</div>
<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text']); ?>
<?= $this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]); ?>
<?= $this->Html->script('/js/dynatable-helper.js', ['block' => true]); ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', ['block' => true]); ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css', ['block' => true]); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['block' => true]); ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt.min.js', ['block' => true]); ?>
<script>
    var e = jQuery.Event("keypress");
    e.which = 13; // Enter

    $('#dynatable-filter').click(function() {
        $('#dynatable-filter').trigger(e);
        // emptyCookie();
    });

    $(document).ready(function() {
        $('#pedido').select2({
            theme: "bootstrap4",
            ajax: {
                url: '/tutelareducativos/idPedidoAutoComplete',
                dataType: 'json',
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function(data) {
                    console.log(data['results'])
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data.results
                    };
                }
            },
            minimumInputLength: 1,
            language: 'pt'
        });

        $('#pedido').on('change', function() {
            console.log($(this).val());
        })

        var writers = {
            ação: function(row) {
                var view = '<a class="btn btn-info mr-1" href="/tutelareducativos/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?= __('Detalhes') ?>"><i class="far fa-eye fa-fw"></i></a>'
                var edit = '<a class="btn btn-warning mr-1" href="/tutelareducativos/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>'
                var dele = '<a class="btn btn-danger" onclick="return confirm(' + "'Deseja mesmo apagar?'" + ')" href="/tutelareducativos/delete/' + row.id + 'data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view + edit + dele + '</div>';
            }
        }

        createDynatable("#dynatable", "/tutelareducativos/", {
            created: -1
        }, writers);

        deleteCookie("Filtro");
        createCookie("Filtro", "", "", "", "", "", "1");
    });

    $('#xlsbutton').click(function() {
        createCookie(
            "Filtro",
            document.getElementById("pedido").value,
            document.getElementById("equipa").value,
            document.getElementById("nome_jovem").value,
            document.getElementById("nif").value,
            document.getElementById("designacao_entidade").value,
            "1"
        );
    });

    $('#pdfbutton').click(function() {
        createCookie(
            "Filtro",
            document.getElementById("pedido").value,
            document.getElementById("equipa").value,
            document.getElementById("nome_jovem").value,
            document.getElementById("nif").value,
            document.getElementById("designacao_entidade").value,
            "1"
        );
    });

    function emptyCookie() {
        createCookie(
            "Filtro",
            document.getElementById("pedido").value = '',
            document.getElementById("equipa").value = '',
            document.getElementById("nome_jovem").value,
            document.getElementById("nif").value,
            document.getElementById("designacao_entidade").value = '',
            "1"
        );
    }

    function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
    }

    function createCookie(name, valuePedido, valueEquipa, valueNomeJovem, valueNif, valueEntidade, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }

        document.cookie = escape(name) + "=" +
            valuePedido + "," + valueEquipa + "," + valueNomeJovem + "," + valueNif + "," + valueEntidade + ","
            expires + "; path=/";
    }
</script>
<?php $this->end(); ?>