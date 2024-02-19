<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Add Versement</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="index.php?page=versement&action=add" method="POST">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="ChauffeurID">
                                        <?php foreach($chauffeurs as $chauffeur) {?>
                                        <option value="<?= $chauffeur['ChauffeurID'];?>"> <?= $chauffeur['Nom']." ".$chauffeur['Prenom'];?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">Choix Chauffeur</label>
                                </div>
                                <div class="mb-3">
                                    <label for="Montant" class="form-label">Montant</label>
                                    <input type="text" class="form-control" name="Montant">
                                </div>
                                <div class="mb-3">
                                    <!-- DateVersement = date Versement -->
                                    <label for="DateVersement" class="form-label">Date Versement</label>
                                    <input type="date" class="form-control" name="DateVersement">
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="TaxiID">
                                        <?php foreach($taxis as $taxi) {?>
                                        <option value="<?= $taxi['TaxiID'];?>"> <?= $taxi['NumeroPlaque'];?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">Choix Taxi</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Versement</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>