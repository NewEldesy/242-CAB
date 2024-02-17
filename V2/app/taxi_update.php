<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Update Information</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="test.php?page=taxi&choix=update&id=<?= $result['TaxiID'];?>" method="POST">
                                <input type="hidden" value="<?= $result['TaxiID'];?>" name="TaxiID">
                                <div class="mb-3">
                                    <label for="Marque" class="form-label">Marque Voiture</label>
                                    <input type="text" class="form-control" value="<?= $result['Marque'];?>" name="Marque">
                                </div>
                                <div class="mb-3">
                                    <label for="NumeroPlaque" class="form-label">Immatriculation Voiture</label>
                                    <input type="text" class="form-control" value="<?= $result['NumeroPlaque'];?>" name="NumeroPlaque">
                                </div>
                                <div class="mb-3">
                                    <!-- DateMiseEnCirculation = date mise en circulation -->
                                    <label for="DateMiseEnCirculation" class="form-label">Date Mise en Circulation</label>
                                    <input type="text" class="form-control" value="<?= $result['DateMiseEnCirculation'];?>" name="DateMiseEnCirculation">
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