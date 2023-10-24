var assignObjectResultTable;

document.addEventListener('DOMContentLoaded', function(){
    assignObjectResultTable = $('#assignORTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditAssignObjectResult/getAssignObjectResult",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"object_result"},
            {"data":"teacher_firstname"},
            {"data":"teacher_lastname"},
            {"data":"subject"},
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

    var dataFormAddAssignOR = document.querySelector("#formAddAssingObjectResult");
    var dataFormEditAssignOR = document.querySelector("#formEditAssingObjectResult");

    dataFormAddAssignLR.onsubmit = function(e){
        e.preventDefault();
        var intObjectResult = document.querySelector("#listObjectResult").value;
        var intTeacher = document.querySelector("#listTeacher").value;
        var intSubject = document.querySelector("#listSubject").value;
        if(intObjectResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignObjectResult/postAssignObjectResult', dataFormAddAssignLR, '#addAssignObjectResultModal', formAddAssingObjectResult);
    }

    dataFormEditAssignLR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtIDEdit").value;
        var intObjectResult = document.querySelector("#listEditObjectResult").value;
        var intTeacher = document.querySelector("#listEditTeacher").value;
        var intSubject = document.querySelector("#listEditSubject").value;
        if(intCode == "" || intObjectResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignObjectResult/putAssignObjectResult/' + intCode, dataFormEditAssignLR, '#editAssignObjectResultModal', formEditAssingObjectResult);
    }
});

function addAssingLerningResultModal(){
    getSelect("ObjectResult/getObjectResultSelect", "#listObjectResult", 0);
    getSelect("Teacher/getTeacher", "#listTeacher", 0); 
    getSelect("SubjectLR/getSubject", "#listSubject", 0);
    $('#addAssignObjectResultModal').modal('show');
}

function editAssignLerningResultModal(button){
    let idAssignObjectResult = button.getAttribute('aor');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditAssignObjectResult/getAssignObjectResultById/' + idAssignObjectResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#txtIDEdit").value = objData.msg.id;
                getSelect("ObjectResult/getObjectResultSelect", "#listEditObjectResult", objData.msg.codigo_resultados);
                getSelect("Teacher/getTeacher", "#listEditTeacher", objData.msg.codigo_profesor);
                getSelect("SubjectLR/getSubject", "#listEditSubject", objData.msg.codigo_espacio);
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }

    $('#editAssignObjectResultModal').modal('show');
}

function postPutExecution(url, dataFormAOR, modalName, formModal){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+url;
    let formData = new FormData(dataFormAOR);
    request.open('POST', ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $(modalName).modal("hide");
                    formModal.reset();
                    swal("Asignación resultados de aprendizaje", objData.msg, "success");
                    assignObjectResultTable.ajax.reload();
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
                    assignObjectResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}

function deleteAssignObjectResult(deleteButton){
    let code = deleteButton.getAttribute('aor');
    swal({
        title: "Eliminar asignación de resultado de aprendizaje",
        text: "¿Realmente quiere eliminar la asignación?",
        icon: "warning",
        buttons: {
            cancel: "¡No, cancelar!",
            confirm: "¡Si, eliminar!",
          },
        closeOnconfirm: false
    }).then(result => {
        if(result){
            deleteExecution('EditAssignObjectResult/deleteAssignObjectResult/'+ code);
        } else {
            swal("Cancelado", "El resultado de aprendizaje esta ha salvo", "error");
        }
        
    });
}

function getSelect(url, selector, code){
    let ajaxUrl = base_url+url;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector(selector).innerHTML = request.responseText;
            if(code != 0){
                document.querySelector(selector).value = code;
            }
            searchSelect(selector);
        }
    }
}

function searchSelect(selector){
    let selectBoxElement = document.querySelector(selector);
    dselect(selectBoxElement, {
        search: true
    });
}

function noBack(){
    history.go(1);
}