<?php include_once('partials/head.php');?>

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4>Attribution List</h4>
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
                                <!-- TaxiID	ChauffeurID	DateDebut	DateFin -->
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Taxi ID</th>
                                    <th scope="col">Chauffeur ID</th>
                                    <th scope="col">Date Debut</th>
                                    <th scope="col">Date Fin</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($results as $result) {?>
                                <tr>
                                    <td><?=$result['AttributionID']?></td>
                                    <td><?=$result['TaxiID']?></td>
                                    <td><?=$result['ChauffeurID']?></td>
                                    <td><?=$result['DateDebut']?></td>
                                    <td><?=$result['DateFin']?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=attribution&action=delete&id=<?=$result['AttributionID']?>">Delete</a>
                                        <a class="btn btn-sm btn-primary" href="index.php?page=attribution&action=update&id=<?=$result['AttributionID']?>">Update</a>
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