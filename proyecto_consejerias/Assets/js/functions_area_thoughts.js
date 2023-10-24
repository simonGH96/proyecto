var areaThoughtsTable;

document.addEventListener('DOMContentLoaded', function(){
    
    let load = window.location.href;
    let arr = load.split("/");
    let lastItem = arr[arr.length-1];

    var dataFormAreaLearningResult = document.querySelector("#formAreaThoughts");

    dataFormAreaLearningResult.onsubmit = function(e){
        e.preventDefault();
        var intComponent = document.querySelector("#listComponents").value;
        window.location.href= base_url+'AreaThoughts/AreaThoughts/'+intComponent;
    }

    areaThoughtsTable = $('#areaThoughtsTable').DataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/AreaThoughts/getSubjectByIdThinking/" + lastItem,
            "dataSrc":""
        },
        "columns":[
            {"data":"name_component"},
            {"data":"name_thinking"},
            {"data":"count"}
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Exportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Exportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Exportar a CSV",
                "className": "btn btn-warning"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10
    });
});
