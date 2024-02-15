<?php include_once('../partials/head.php');?>

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
                            <form>
                                <input type="hidden" value="" name="idCU">
                                <div class="mb-3">
                                    <label for="NomCU" class="form-label">Nom</label>
                                    <input type="text" class="form-control" value="" name="NomCU">
                                </div>
                                <div class="mb-3">
                                    <label for="prenomCU" class="form-label">Prénom(s)</label>
                                    <input type="text" class="form-control" value="" name="plaquetaxi">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('../partials/footer.php');?>