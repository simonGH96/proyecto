var assignConceptualResultTable;

document.addEventListener('DOMContentLoaded', function(){
    assignLearningResultTable = $('#assignCRTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditAssignConceptualResult/getAssignConceptualResult",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"conceptual_result"},
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

    var dataFormAddAssignCR = document.querySelector("#formAddAssingConceptualResult");
    var dataFormEditAssignCR = document.querySelector("#formEditAssingConceptualResult");

    dataFormAddAssignCR.onsubmit = function(e){
        e.preventDefault();
        var intConceptualResult = document.querySelector("#listConceptualResult").value;
        var intTeacher = document.querySelector("#listTeacher").value;
        var intSubject = document.querySelector("#listSubject").value;
        if(intConceptualResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignConceptualResult/postAssignConceptualResult', dataFormAddAssignCR, '#addAssignConceptualResultModal', formAddAssingConceptualResult);
    }

    dataFormEditAssignCR.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtIDEdit").value;
        var intConceptualResult = document.querySelector("#listEditConceptualResult").value;
        var intTeacher = document.querySelector("#listEditTeacher").value;
        var intSubject = document.querySelector("#listEditSubject").value;
        if(intCode == "" || intConceptualResult == "" || intTeacher == "" || intSubject == ""){
            swal("Advertencia", "Todos los campos son oblicatorios", "error");
            return false;
        }
        postPutExecution('EditAssignConceptualResult/putAssignConceptualResult/' + intCode, dataFormEditAssignCR, '#editAssignConceptualResultModal', formEditAssingConceptualResult);
    }
});

function addAssingConceptualResultModal(){
    getSelect("ConceptualResult/getConceptualResultSelect", "#listConceptualResult", 0);
    getSelect("Teacher/getTeacher", "#listTeacher", 0); 
    getSelect("Subject/getSubject", "#listSubject", 0);
    $('#addAssignConceptualResultModal').modal('show');
}

function editAssignConceptualResultModal(button){
    let idAssignConceptualResult = button.getAttribute('acr');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditAssignConceptualResult/getAssignConceptualResultById/' + idAssignConceptualResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#txtIDEdit").value = objData.msg.id;
                getSelect("ConceptualResult/getConceptualResultSelect", "#listEditConceptualResult", objData.msg.codigo_resultados);
                getSelect("Teacher/getTeacher", "#listEditTeacher", objData.msg.codigo_profesor);
                getSelect("Subject/getSubject", "#listEditSubject", objData.msg.codigo_espacio);
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }

    $('#editAssignConceptualResultModal').modal('show');
}

function postPutExecution(url, dataFormALR, modalName, formModal){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+url;
    let formData = new FormData(dataFormACR);
    request.open('POST', ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $(modalName).modal("hide");
                    formModal.reset();
                    swal("Asignación herramientas conceptuales", objData.msg, "success");
                    assignConceptualResultTable.ajax.reload();
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
                    assignConceptualResultTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}

function deleteAssignConceptualResult(deleteButton){
    let code = deleteButton.getAttribute('acr');
    swal({
        title: "Eliminar herramienta conceptual",
        text: "¿Realmente quiere eliminar la asignación?",
        icon: "warning",
        buttons: {
            cancel: "¡No, cancelar!",
            confirm: "¡Si, eliminar!",
          },
        closeOnconfirm: false
    }).then(result => {
        if(result){
            deleteExecution('EditAssignConceptualResult/deleteAssignConceptualResult/'+ code);
        } else {
            swal("Cancelado", "La herramienta conceptual esta ha salvo", "error");
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