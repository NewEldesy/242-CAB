<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Update Versement</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="index.php?page=versement&action=update&id=<?= $result['VersementID'];?>" method="POST">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="<?= $result['VersementID'];?>" name="VersementID">
                                </div>
                                <div class="mb-3">
                                    <label for="ChauffeurID" class="form-label">Chauffeur ID</label>
                                    <input type="text" class="form-control"  value="<?= $result['ChauffeurID'];?>" name="ChauffeurID">
                                </div>
                                <div class="mb-3">
                                    <label for="Montant" class="form-label">Montant</label>
                                    <input type="text" class="form-control"  value="<?= $result['Montant'];?>" name="Montant">
                                </div>
                                <div class="mb-3">
                                    <!-- DateVersement = date Versement -->
                                    <label for="DateVersement" class="form-label">Date Versement</label>
                                    <input type="date" class="form-control"  value="<?= $result['DateVersement'];?>" name="DateVersement">
                                </div>
                                <div class="mb-3">
                                    <label for="TaxiID" class="form-label">Taxi ID</label>
                                    <input type="text" class="form-control"  value="<?= $result['TaxiID'];?>" name="TaxiID">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>