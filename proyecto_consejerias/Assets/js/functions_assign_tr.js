var assignThinkingResultTable;

document.addEventListener('DOMContentLoaded', function(){
    assignThinkingResultTable = $('#assignTRTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditAssignThinkingResult/getAssignThinkingResult",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"thinking_result"},
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

    var dataFormAddAssignTR = document.querySelector("#formAddAssingThinkingResult");
    var dataFormEditAssignTR = document.querySelector("#formEditAssingThinkingResult");

    dataFormAddAssignTR.onsubmit = function(e){
        e.preventDefault();
        var intThinkingResult = document.querySelector("#listThinkingResult").value;
        var intTeacher = document.querySelector("#listTeacher").value;
        var intSubject = document.querySelector("#listSubject").value;
        if(intThinkingResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignThinkingResult/postAssignThinkingResult', dataFormAddAssignTR, '#addAssignThinkingResultModal', formAddAssingThinkingResult);
    }

    dataFormEditAssignTR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtIDEdit").value;
        var intThinkingResult = document.querySelector("#listEditThinkingResult").value;
        var intTeacher = document.querySelector("#listEditTeacher").value;
        var intSubject = document.querySelector("#listEditSubject").value;
        if(intCode == "" || intThinkingResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignThinkingResult/putAssignThinkingResult/' + intCode, dataFormEditAssignLR, '#editAssignThinkingResultModal', formEditAssingThinkingResult);
    }
});

function addAssingLerningResultModal(){
    getSelect("ThinkingResult/getThinkingResultSelect", "#listThinkingResult", 0);
    getSelect("Teacher/getTeacher", "#listTeacher", 0); 
    getSelect("SubjectLR/getSubject", "#listSubject", 0);
    $('#addAssignThinkingResultModal').modal('show');
}

function editAssignLerningResultModal(button){
    let idAssignThinkingResult = button.getAttribute('aor');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditAssignThinkingResult/getAssignThinkingResultById/' + idAssignThinkingResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#txtIDEdit").value = objData.msg.id;
                getSelect("ThinkingResult/getThinkingResultSelect", "#listEditThinkingResult", objData.msg.codigo_resultados);
                getSelect("Teacher/getTeacher", "#listEditTeacher", objData.msg.codigo_profesor);
                getSelect("SubjectLR/getSubject", "#listEditSubject", objData.msg.codigo_espacio);
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }

    $('#editAssignThinkingResultModal').modal('show');
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
                    assignThinkingResultTable.ajax.reload();
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
                    assignThinkingResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}

function deleteAssignThinkingResult(deleteButton){
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
            deleteExecution('EditAssignThinkingResult/deleteAssignThinkingResult/'+ code);
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