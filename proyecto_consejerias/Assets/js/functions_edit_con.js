var counselingTable;

document.addEventListener('DOMContentLoaded', function(){
    counselingTable = $('#counselingTable').DataTable({
        "aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/EditCounseling/getCounseling",
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

    var dataFormAddCON = document.querySelector("#formAddCounseling");
    var dataFormEditCON = document.querySelector("#formEditCounseling");

    dataFormAddCON.onsubmit = function(e){
        e.preventDefault();
        var strName = document.querySelector("#txtNameAdd").value;
        var strDescription = document.querySelector("#txtDescriptionAdd").value;
        if(strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son obligatorios", "error");
            return false;
        }
        postPutExecution('EditCounseling/postCounseling', dataFormAddCON, '#addCounselingModal', formAddCounseling);
    }

    dataFormEditCON.onsubmit = function(e){
        e.preventDefault();
        var intCode = document.querySelector("#txtCodeEdit").value;
        var strName = document.querySelector("#txtNameEdit").value;
        var strDescription = document.querySelector("#txtDescriptionEdit").value;
        if(intCode == "" || strName == "" || strDescription == ""){
            swal("Advertencia", "Todos los campos son obligatorios", "error");
            return false;
        }
        postPutExecution('EditCounseling/putCounseling/' + intCode, dataFormEditCON, '#editCounselingModal', formEditCounseling);
    }
});

function addCounselingModal(){
    $('#addCounselingModal').modal('show');
}

function editCounselingModal(button){
    let idCounseling = button.getAttribute('con');
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'EditCounseling/getCounselingById/' + idCounseling;
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

    $('#editCounselingModal').modal('show');
}

function postPutExecution(url, dataFormCON, modalName, formModal){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+url;
    let formData = new FormData(dataFormCON);
    request.open('POST', ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $(modalName).modal("hide");
                    formModal.reset();
                    swal("Consejerias", objData.msg, "success");
                    counselingTable.ajax.reload();
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
                    counselingTable.ajax.reload();
                } else {
                    swal("Cancelado", objData.msg, "error");
                }
            }
        }
}


function deleteCounseling(deleteButton){
    let code = deleteButton.getAttribute('con');
    swal({
        title: "Eliminar Consejeria",
        text: "¿Realmente quiere eliminar la consejeria?",
        icon: "warning",
        buttons: {
            cancel: "¡No, cancelar!",
            confirm: "¡Si, eliminar!",
          },
        closeOnconfirm: false
    }).then(result => {
        if(result){
            deleteExecution('EditCounseling/deleteCounseling/'+ code);
        } else {
            swal("Cancelado", "La consejeria esta ha salvo", "error");
        }
        
    });
}

function noBack(){
    history.go(1);
}