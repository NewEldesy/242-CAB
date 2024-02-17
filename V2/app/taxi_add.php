<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Add Taxi</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="test.php?page=taxi&choix=add" method="POST">
                                <div class="mb-3">
                                    <label for="Marque" class="form-label">Marque Voiture</label>
                                    <input type="text" class="form-control" name="Marque">
                                </div>
                                <div class="mb-3">
                                    <label for="NumeroPlaque" class="form-label">Immatriculation Voiture</label>
                                    <input type="text" class="form-control" name="NumeroPlaque">
                                </div>
                                <div class="mb-3">
                                    <!-- DateMiseEnCirculation = date mise en circulation -->
                                    <label for="DateMiseEnCirculation" class="form-label">Date Mise en Circulation</label>
                                    <input type="date" class="form-control" name="DateMiseEnCirculation">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Taxi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>