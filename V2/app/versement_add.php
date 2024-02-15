<?php include_once('../partials/head.php');?>

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
                            <form>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>Chauffeur</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="floatingSelect">Choix Chauffeur</label>
                                </div>
                                <div class="mb-3">
                                    <label for="montant" class="form-label">Montant</label>
                                    <input type="text" class="form-control" name="montant">
                                </div>
                                <div class="mb-3">
                                    <!-- dateV = date Versement -->
                                    <label for="dateV" class="form-label">Date Versement</label>
                                    <input type="text" class="form-control" name="dateV">
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>Taxi</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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

<?php include_once('../partials/footer.php');?>