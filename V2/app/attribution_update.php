<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Update Attribution</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="index.php?page=attribution&action=update&id=<?= $result['AttributionID'];?>" method="POST">
                                <input type="hidden" value="<?= $result['AttributionID'];?>" name="AttributionID">
                                <div class="mb-3">
                                    <label for="TaxiID" class="form-label">Taxi ID</label>
                                    <input type="text" class="form-control" value="<?= $result['TaxiID'];?>" name="TaxiID">
                                </div>
                                <div class="mb-3">
                                    <label for="ChauffeurID" class="form-label">Chauffeur ID</label>
                                    <input type="text" class="form-control" value="<?= $result['ChauffeurID'];?>" name="ChauffeurID">
                                </div>
                                <div class="mb-3">
                                    <label for="DateDebut" class="form-label">Date Debut</label>
                                    <input type="date" class="form-control" value="<?= $result['DateDebut'];?>" name="DateDebut">
                                </div>
                                <div class="mb-3">
                                    <label for="DateFin" class="form-label">Date Fin</label>
                                    <input type="date" class="form-control" value="<?= $result['DateFin'];?>" name="DateFin">
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