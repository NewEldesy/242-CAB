<?php include_once('partials/head.php');?>


         


            <!-- Blank Start -->
            <!-- Typography Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Add Taxi</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Typography End -->

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <form>
                                <div class="mb-3">
                                    <label for="marquetaxi" class="form-label">Marque Voiture</label>
                                    <input type="text" class="form-control" name="marquetaxi">
                                </div>
                                <div class="mb-3">
                                    <label for="plaquetaxi" class="form-label">Immatriculation Voiture</label>
                                    <input type="text" class="form-control" name="plaquetaxi">
                                </div>
                                <div class="mb-3">
                                    <!-- dateC = date mise en circulation -->
                                    <label for="dateC" class="form-label">Date Mise en Circulation</label>
                                    <input type="text" class="form-control" name="dateC">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Taxi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Blank End -->


<?php include_once('partials/footer.php');?>