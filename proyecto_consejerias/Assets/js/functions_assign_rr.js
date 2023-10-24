var assignResourceResultTable;

document.addEventListener('DOMContentLoaded', function(){
    assignResourceResultTable = $('#assignRRTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditAssignResourceResult/getAssignResourceResult",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"resource_result"},
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

    var dataFormAddAssignRR = document.querySelector("#formAddAssingResourceResult");
    var dataFormEditAssignRR = document.querySelector("#formEditAssingResourceResult");

    dataFormAddAssignRR.onsubmit = function(e){
        e.preventDefault();
        var intResourceResult = document.querySelector("#listResourceResult").value;
        var intTeacher = document.querySelector("#listTeacher").value;
        var intSubject = document.querySelector("#listSubject").value;
        if(intResourceResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignResourceResult/postAssignResourceResult', dataFormAddAssignRR, '#addAssignResourceResultModal', formAddAssingResourceResult);
    }

    dataFormEditAssignRR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtIDEdit").value;
        var intResourceResult = document.querySelector("#listEditResourceResult").value;
        var intTeacher = document.querySelector("#listEditTeacher").value;
        var intSubject = document.querySelector("#listEditSubject").value;
        if(intCode == "" || intResourceResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignResourceResult/putAssignResourceResult/' + intCode, dataFormEditAssignLR, '#editAssignResourceResultModal', formEditAssingResourceResult);
    }
});

function addAssingLerningResultModal(){
    getSelect("ResourceResult/getResourceResultSelect", "#listResourceResult", 0);
    getSelect("Teacher/getTeacher", "#listTeacher", 0); 
    getSelect("SubjectLR/getSubject", "#listSubject", 0);
    $('#addAssignResourceResultModal').modal('show');
}

function editAssignLerningResultModal(button){
    let idAssignResourceResult = button.getAttribute('aor');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditAssignResourceResult/getAssignResourceResultById/' + idAssignResourceResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#txtIDEdit").value = objData.msg.id;
                getSelect("ResourceResult/getResourceResultSelect", "#listEditResourceResult", objData.msg.codigo_resultados);
                getSelect("Teacher/getTeacher", "#listEditTeacher", objData.msg.codigo_profesor);
                getSelect("SubjectLR/getSubject", "#listEditSubject", objData.msg.codigo_espacio);
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }

    $('#editAssignResourceResultModal').modal('show');
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
                    assignResourceResultTable.ajax.reload();
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
                    assignResourceResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}

function deleteAssignResourceResult(deleteButton){
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
            deleteExecution('EditAssignResourceResult/deleteAssignResourceResult/'+ code);
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