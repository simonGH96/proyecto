
<?php pageHeader($data);?>
<?php searchbarConceptual($data);?>
<?php getModal('ConceptualResultModal', $data);?>
<script>
    var totalPageGeneral = <?= $data['pagination'] - 1; ?>;
</script>
<div class="row justify-content-center" id="contentConceptualResults">
    <div class="col-10">
        <div class="card-derk">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4" id="show-cards">
                
            </div>
        </div>
        <nav aria-label="Page navigation" id="bottomPagination">
            
        </nav>
    </div>
</div>
<?php footer($data); ?>