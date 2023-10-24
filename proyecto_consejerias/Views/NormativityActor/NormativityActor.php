<?php pageHeader($data);?>

    <div class="row justify-content-center" id="card-content-page">
    <div class="col-10">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3><?= $data['page_title'];?></h3>
        </div>

        <div class="card-body row justify-content-center" id="card-body-page">
            
            <div class="col-11">
                <form id="formConceptualTools" name="formConceptualTools">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <select class="form-select" id="listComponents" name="listComponents">
                                <option value="">Elija un componente</option>
                                <?php $array = optionsAreaAnalysis();
                                foreach ($array as $key => $value){
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                }?>
                            </select>

                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-warning">Seleccionar</button>
                        </div>
                    </div>
                </form>
                <div class="tile">
                    <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered table-bordered mb-0" id="conceptualToolsTable" style="width:100%">
                        <thead>
                            <tr>
                            <th>Acuerdo</th>
                            <th>Tema</th>
                            <th>Vigencia</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php footer($data);?>