<?php include_once('partials/head.php');?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-taxi fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Taxi</p>
                                <h6 class="mb-0"><?= $nTaxis;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-user-slash fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Chauffeur</p>
                                <h6 class="mb-0"><?= $nChauffeurs;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-receipt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Versement</p>
                                <h6 class="mb-0"><?= $nVersements;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-wrench fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Panne</p>
                                <h6 class="mb-0"><?= $nPannes;?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Recent Versement Start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Versement</h6>
                        <a href="index.php?page=versement&action=view">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Chauffeur ID</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Date Versement</th>
                                    <th scope="col">Taxi ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lastV as $versement) {?>
                                <tr>
                                    <td><?= $versement['VersementID'];?></td>
                                    <td><?= $versement['ChauffeurID'];?></td>
                                    <td><?= $versement['Montant'];?></td>
                                    <td><?= $versement['DateVersement'];?></td>
                                    <td><?= $versement['TaxiID'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Versement End -->

            <!-- Recent Pannes Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Panne</h6>
                        <a href="index.php?page=panne&action=view">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Taxi ID</th>
                                    <th scope="col">Date Panne</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lastP as $panne) {?>
                                <tr>
                                    <td><?= $panne['PanneID'];?></td>
                                    <td><?= $panne['TaxiID'];?></td>
                                    <td><?= $panne['DatePanne'];?></td>
                                    <td><?= $panne['Description'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Pannes End -->

<?php include_once('partials/footer.php');