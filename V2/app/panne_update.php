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
                            <form action="index.php?page=panne&action=update&id=<?= $result['PanneID'];?>" method="POST">
                                <input type="hidden" value="<?= $result['PanneID'];?>" name="PanneID">
                                <div class="mb-3">
                                    <label for="TaxiID" class="from-label">Taxi ID</label>
                                    <input type="text" class="form-control" value="<?= $result['TaxiID'];?>" name="TaxiID">
                                </div>
                                <div class="mb-3">
                                    <!-- DatePanne = date Panne -->
                                    <label for="DatePanne" class="form-label">Date Panne</label>
                                    <input type="date" class="form-control" value="<?= $result['DatePanne'];?>" name="DatePanne">
                                </div>
                                <div class="mb-3">
                                    <label for="Description" class="form-label">Panne Description</label>
                                    <input type="text" class="form-control" value="<?= $result['Description'];?>" name="Description">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Panne</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>