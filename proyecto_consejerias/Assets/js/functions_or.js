var objectResultTable;

document.addEventListener('DOMContentLoaded', function(){
    objectResultTable = $('#objectResultTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditObjectResult/getObjectResult",
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

    var dataFormAddOR = document.querySelector("#formAddObjectResult");
    var dataFormEditOR = document.querySelector("#formEditObjectResult");

    dataFormAddCR.onsubmit = function(e){
        e.preventDefault();
        var strName = document.querySelector("#txtNameAdd").value;
        var strDescription = document.querySelector("#txtDescriptionAdd").value;
        if(strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditObjectResult/postObjectResult', dataFormAddOR, '#addObjectResultModal', formAddObjectResult);
    }

    dataFormEditCR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtCodeEdit").value;
        var strName = document.querySelector("#txtNameEdit").value;
        var strDescription = document.querySelector("#txtDescriptionEdit").value;
        if(intCode == "" || strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditObjectResult/putObjectResult/' + intCode, dataFormEditOR, '#editObjectResultModal', formEditObjectResult);
    }
});

function addObjectResultModal(){
    $('#addObjectResultModal').modal('show');
}

function editObjectResultModal(button){
    let idObjectResult = button.getAttribute('or');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditObjectResult/getObjectResultById/' + idObjectResult;
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

    $('#editObjectResultModal').modal('show');
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
                    swal("Objetos de Aprendizaje", objData.msg, "success");
                    objectResultTable.ajax.reload();
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
                    objectResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}


function deleteObjectResult(deleteButton){
    let code = deleteButton.getAttribute('or');
    swal({
        title: "Eliminar objeto de aprendizaje",
        text: "¿Realmente quiere eliminar el objeto de aprendizaje?",
        icon: "warning",
        buttons: {
            cancel: "¡No, cancelar!",
            confirm: "¡Si, eliminar!",
          },
        closeOnconfirm: false
    }).then(result => {
        if(result){
            deleteExecution('EditObjectResult/deleteObjectResult/'+ code);
        } else {
            swal("Cancelado", "El objeto de aprendizaje esta ha salvo", "error");
        }
        
    });
}