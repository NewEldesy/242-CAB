<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Panne List</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Taxi ID</th>
                                    <th scope="col">Date Panne</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($results as $result) {?>
                                <tr>
                                    <td><?= $result['PanneID'];?></td>
                                    <td><?= $result['TaxiID'];?></td>
                                    <td><?= $result['DatePanne'];?></td>
                                    <td><?= $result['Description'];?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=panne&action=delete&id=<?= $result['PanneID'];?>">Delete</a>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=panne&action=update&id=<?= $result['PanneID'];?>">Update</a>
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