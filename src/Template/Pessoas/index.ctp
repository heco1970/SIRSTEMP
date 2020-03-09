<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);
    $pessoaNome = "";
?>

<?php 
    $filtroNome ="";
    /*
    //echo print_r($_SERVER);
   
    if($_SERVER['QUERY_STRING'] != null){
        parse_str($_SERVER['QUERY_STRING'], $output);
        if($output['queries'] != null){
            if($output['queries'] != null){
                $filter=$output['queries'];
                echo print_r($output['queries'], TRUE);
                echo print_r($filter['nome'], TRUE);
                $filtroNome = $filter['nome'];
            }
        }
    }
    else{
        $filtroNome ="";
    }
    $a="";
    
    $a = "<script> document.getElementById('nome').value </script>";
    */
?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Pessoas')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/pessoas/add"><i class="fas fa-plus"></i></a>
        <?= $this->Html->link(
            '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
            ['action' => 'xls', /*$filtroNome '<script> document.getElementById("xd").value </script>'*/ $filtroNome ],
            ['escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right']) 
        ?>      
        <!-- <button id="dynatable-export" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-file-excel"></i></button> -->
        <input 
            type="button" 
            onclick="tableToExcel('dynatable', 'name', 'myfile.xls')" 
            value="Export to Excel"
        >
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
    </div>
</div>


<?php
$dynElems =
    [
        'id' => ['label' => __('Id')],
        'nome' => ['label' => __('Nome')],
    ];
    //echo print_r($dynElems);
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems['created'] = ['label' => 'Data de Criação'];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Pessoas')?></h6>
    </div>
    <div class="card-body">
        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
</div>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text' ]); ?>

<!--APAGAR -->
<button onclick="tableToExcel('dynatable', 'W3C Example Table')">Export</button>
<button id="var">Export teste 2</button>


<button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>
<span id="xd"> aaa </span>
<!--APAGAR -->

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
<script>
    $(document).ready(function() {
        var writers = {
            actions: function(row) {
                var view = '<a class="btn btn-info" href="/pessoas/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view +  '</div>';
            }
        }
        createDynatable("#dynatable","/pessoas/",{created: -1}, writers);

        //document.getElementById("var").innerHTML = document.getElementById("nome").value;

        
        document.getElementById("nome").onkeyup = function() {
            document.getElementById("xd").innerHTML = document.getElementById("nome").value;

            <?php
                //$filtroNome = document.getElementById("nome").value;
            ?> 
            
        };
       
        /*
        document.getElementById("var").onclick = function() {
            document.getElementById("xd").innerHTML = print_r(myTableArray);
        };
        */

        // function removeElement(url)
    });

    /*
    document.getElementById("var").onclick = function() {
        $.ajax({
            type: "POST",
            url: "src/Controller/PessoasController.php",
            data: { name: "John" }
        }).done(function( /*msg ) {
            alert( "Data Saved: " /*+ msg );
        });
    };

    $(document).ready(function(){
        $('.button').click(function(){
            var clickBtnValue = $(this).val();
            var ajaxurl = 'ajax.php',
            data =  {'action': clickBtnValue};
            $.post(ajaxurl, data, function (response) {
                // Response div goes here.
                alert("action performed successfully");
            });
        });
    });
    */

    var tableInfo = Array.prototype.map.call(document.querySelectorAll('dynatable tr'), function(tr){
    return Array.prototype.map.call(tr.querySelectorAll('td'), function(td){
        return td.innerHTML;
        });
    });


    var myTableArray = [];

    $("table#dynatable tr").each(function() {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
            tableData.each(function() { arrayOfThisRow.push($(this).text()); });
            myTableArray.push(arrayOfThisRow);
        }
    });
    
      
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })()

    function tableToExcel(table, name, filename) {
        let uri = 'data:application/vnd.ms-excel;base64,', 
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>', 
        base64 = function(s) { return window.btoa(decodeURIComponent(encodeURIComponent(s))) },         format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
        
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

        var link = document.createElement('a');
        link.download = filename;
        link.href = uri + base64(format(template, ctx));
        link.click();
    }

    function fnExcelReport()
    {
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange; var j=0;
        tab = document.getElementById('dynatable'); // id of table

        for(j = 0 ; j < tab.rows.length ; j++) 
        {     
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text=tab_text+"</table>";
        tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
        }  
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }


    function a(){
        //var dynatable = $('#dynatable').data('dynatable');

        //document.getElementById("aaa").innerHTML = Object.getOwnPropertyNames(dynatable);
        

        //var keys = Object.keys(dynatable);

        //var table = $('#dynatable');

        //document.getElementById("aaa").innerHTML = table;
        /*
        table.data('dynatable').records.resetOriginal();
        table.data('dynatable').queries.run();
        table.data('dynatable').sorts.init();
        var nodes = table.data('dynatable').records.sort();

        /*
        var csvContent = "data:text/xls;charset=utf-8,";
        nodes.forEach(function(infoArray, index){
        infoArray = $.map(infoArray, function(el) { return el; });
        dataString = infoArray.join(",");
        csvContent += index < nodes.length ? dataString+ "\n" : dataString;
        });
        var encodedUri = encodeURI(csvContent);
        window.open(encodedUri);
        

        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "my_data.xls");
        document.body.appendChild(link); // Required for FF

        link.click();
        */

    }

    /*
    function myFunction(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        
        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';
        
        // Create download link element
        //downloadLink = document.createElement("a");
        
        //document.body.appendChild(downloadLink);
        //document.getElementById("aaa").innerHTML = downloadLink;

        var element = document.getElementById("aaa");
        element.classList.add('href="' + downloadLink + '");
        
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        
            // Setting the file name
            downloadLink.download = filename;
            
            //triggering the function
            downloadLink.click();
        }
    }
    */
    

</script>
<?php $this->end(); ?>
