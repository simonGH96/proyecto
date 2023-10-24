var conceptualResultTable;

document.addEventListener('DOMContentLoaded', function(){
    conceptualResultTable = $('#conceptualResultTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditConceptualResult/getConceptualResult",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigo"},
            {"data":"descripcion"},
            {"data":"detalle"},
            {"data":"acciones"}
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

    var dataFormAddCR = document.querySelector("#formAddConceptualResult");
    var dataFormEditCR = document.querySelector("#formEditConceptualResult");

    dataFormAddLR.onsubmit = function(e){
        e.preventDefault();
        var strName = document.querySelector("#txtNameAdd").value;
        var strDescription = document.querySelector("#txtDescriptionAdd").value;
        if(strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son obligatorios", "error");
            return false;
        }
        postPutExecution('EditConceptualResult/postConceptualResult', dataFormAddCR, '#addConceptualResultModal', formAddConceptualResult);
    }

    dataFormEditLR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtCodeEdit").value;
        var strName = document.querySelector("#txtNameEdit").value;
        var strDescription = document.querySelector("#txtDescriptionEdit").value;
        if(intCode == "" || strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditConceptualResult/putConceptualResult/' + intCode, dataFormEditCR, '#editConceptualResultModal', formEditConceptualResult);
    }
});

function addConceptualResultModal(){
    $('#addConceptualResultModal').modal('show');
}

function editConceptualResultModal(button){
    let idConceptualResult = button.getAttribute('cr');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditConceptualResult/getConceptualResultById/' + idConceptualResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#txtCodeEdit").value = objData.msg.codigo;
                document.querySelector("#txtNameEdit").value = objData.msg.descripcion;
                document.querySelector("#txtDescriptionEdit").value = objData.msg.detalle;
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }

    $('#editConceptualResultModal').modal('show');
}

function postPutExecution(url, dataFormLR, modalName, formModal){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+url;
    let formData = new FormData(dataFormCR);
    request.open('POST', ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $(modalName).modal("hide");
                    formModal.reset();
                    swal("Herramientas Conceptuales", objData.msg, "success");
                    conceptualResultTable.ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
}

function deleteExecution(url){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+url;
    request.open('POST', ajaxUrl, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    swal("¡Eliminado!", objData.msg, "success");
                    learningResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}


function deleteConceptualResult(deleteButton){
    let code = deleteButton.getAttribute('cr');
    swal({
        title: "Eliminar herramienta conceptual",
        text: "¿Realmente quiere eliminar la herramienta conceptual?",
        icon: "warning",
        buttons: {
            cancel: "¡No, cancelar!",
            confirm: "¡Si, eliminar!",
          },
        closeOnconfirm: false
    }).then(result => {
        if(result){
            deleteExecution('EditConceptualResult/deleteConceptualResult/'+ code);
        } else {
            swal("Cancelado", "La herramienta conceptual esta ha salvo", "error");
        }
        
    });
}

function noBack(){
    history.go(1);
}