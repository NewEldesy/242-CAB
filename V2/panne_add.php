<?php include_once('partials/head.php');?>


         


            <!-- Blank Start -->
            <!-- Typography Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Add Panne</h4>
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
                                    <!-- dateP = date Panne -->
                                    <label for="dateP" class="form-label">Date Panne</label>
                                    <input type="text" class="form-control" name="dateP">
                                </div>
                                <div class="mb-3">
                                    <label for="descript" class="form-label">Panne Description</label>
                                    <input type="text" class="form-control" name="descript">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Panne</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Blank End -->


<?php include_once('partials/footer.php');?>