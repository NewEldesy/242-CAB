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
                            <form action="index.php?page=user&action=update&id=<?= $result['UserID'];?>" method="POST">
                                <input type="hidden" value="<?= $result['UserID'];?>" name="UserID">
                                <div class="mb-3">
                                    <label for="Nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" value="<?= $result['Nom'];?>" name="Nom">
                                </div>
                                <div class="mb-3">
                                    <label for="Prenom" class="form-label">Prenom</label>
                                    <input type="text" class="form-control" value="<?= $result['Prenom'];?>" name="Prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="text" class="form-control" value="<?= $result['Email'];?>" name="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="password" class="form-control" value="<?= $result['Password'];?>" name="Password">
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
