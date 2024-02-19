<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>User List</h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($results as $result) {?>
                                <tr>
                                    <td><?= $result['UserID'];?></td>
                                    <td><?= $result['Nom'];?></td>
                                    <td><?= $result['Prenom'];?></td>
                                    <td><?= $result['Email'];?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=user&action=delete&id=<?= $result['UserID'];?>">Delete</a>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=user&action=update&id=<?= $result['UserID'];?>">Update</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            <!-- Content End -->

<?php include_once('partials/footer.php');?>