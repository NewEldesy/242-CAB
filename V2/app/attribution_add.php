<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Attribution Taxi</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="index.php?page=attribution&action=add" method="POST">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="TaxiID">
                                        <?php foreach($taxis as $taxi) {?>
                                        <option value="<?=$taxi['TaxiID']?>"><?=$taxi['NumeroPlaque'];?></option>
                                        <?php }?>
                                    </select>
                                    <label for="floatingSelect">Choix Taxi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="ChauffeurID">
                                        <?php foreach($chauffeurs as $chauffeur) {?>
                                        <option value="<?=$chauffeur['ChauffeurID']?>"><?=$chauffeur['Nom']." ".$chauffeur['Prenom'];?></option>
                                        <?php }?>
                                    </select>
                                    <label for="floatingSelect">Choix Chauffeur</label>
                                </div>
                                <div class="mb-3">
                                    <label for="DateDebut" class="form-label">Date Debut</label>
                                    <input type="date" class="form-control" name="DateDebut">
                                </div>
                                <div class="mb-3">
                                    <label for="DateFin" class="form-label">Date Fin</label>
                                    <input type="date" class="form-control" name="DateFin">
                                </div>
                                <button type="submit" class="btn btn-primary">Attribution</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>