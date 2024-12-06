<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Theme CSS -->
    <title>Admin - To-Do List</title>
</head>
<body>
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bx-user'></i>
        <?php
            $session = session();
            // Vérifier si l'utilisateur est connecté et afficher son nom
            if ($session->has('user_name')) {
                echo $session->get('user_name');  // Affiche le nom de l'utilisateur
            } else {
                echo 'Nom non disponible';  // Affiche un texte par défaut si l'utilisateur n'est pas connecté
            }
        ?>
    </a>
   <div style="display: flex ; flex-direction: column; justify-content: space-between; height: 90%;">
            <ul class="side-menu top">
                <li>
                    <a href="<?= base_url('admin/index'); ?>">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= base_url('admin/useri'); ?>" class="nav-link1">
                        <i class='bx bxs-truck'></i>
                        <span class="text">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/analytics'); ?>" >
                        <i class='bx bx-bar-chart-alt-2'></i>
                        <span class="text">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/ingred'); ?>">
                        <i class='bx bxs-shopping-bag'></i>
                        <span class="text">Purchases</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="#" class="logout">
                        <i class='bx bxs-log-out-circle'></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
</section>
<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" name="search" aria-label="Search">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
    </nav>


    <!-- Navbar -->
   
                            <div class="col-lg-6 d-none d-lg-block">
                                <form class="form-inline">
                                    <input class="form-control mx-2 my-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-light" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i>
                                    </button>
                                </form>

                            </div>
                            <div class="col-md-4 col-lg-2 mt-2 justify-content-end align-items-center">
                                <button class="btn btn-outline-light mx-2" data-toggle="modal" data-target="#logout"><i
                                        class="fa fa-sign-out" aria-hidden="true"></i>
                                    Logout</button>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav Ends -->
                </div>
            </div>
        </div>

    </nav>

    <!-- Logout Modal -->
    <div class="modal fade" id="logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title">Do You Really Want to Leave?</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <!-- <div class="modal-body">
                    <h5>Press Logout to leave</h5>
                </div> -->
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-light">Stay Here</button>
                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal Ends -->


    <!-- Table Start -->
    <section>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-10 col-md-8 ml-auto">
                    <div class="row align-items-center pt-md-5 mt-md-5 mb-5">
                        <!-- First Table -->
                        <div class="col-12 mb-4 mb-xl-0">
                            <h4 class="text-muted text-center mb-3">All Products</h4>
                            <table class="table bg-light table-striped  text-center" id="allproduct">
                                <thead>
                                    <tr class="text-muted">
                                        <th>#SL</th>
                                        <th>Product ID</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Avaiability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-middle">1</th>
                                        <td class="align-middle">pr001</td>
                                        <td class="align-middle"><img src="./img/product/product-1.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">2</th>
                                        <td class="align-middle">pr002</td>
                                        <td class="align-middle"><img src="./img/product/product-2.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">3</th>
                                        <td class="align-middle">pr003</td>
                                        <td class="align-middle"><img src="./img/product/product-3.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">4</th>
                                        <td class="align-middle">pr004</td>
                                        <td class="align-middle"><img src="./img/product/product-4.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-danger w-60 py-2">Unavailable</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">5</th>
                                        <td class="align-middle">pr005</td>
                                        <td class="align-middle"><img src="./img/product/product-5.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">6</th>
                                        <td class="align-middle">pr001</td>
                                        <td class="align-middle"><img src="./img/product/product-6.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-danger w-60 py-2">Unavailable</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">7</th>
                                        <td class="align-middle">pr007</td>
                                        <td class="align-middle"><img src="./img/product/product-7.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">8</th>
                                        <td class="align-middle">pr008</td>
                                        <td class="align-middle"><img src="./img/product/product-8.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-danger w-60 py-2">Unavailable</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">9</th>
                                        <td class="align-middle">pr009</td>
                                        <td class="align-middle"><img src="./img/product/product-9.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-success w-60 py-2">Available</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">10</th>
                                        <td class="align-middle">pr0010</td>
                                        <td class="align-middle"><img src="./img/product/product-13.jpg" width="70px"
                                                alt="product-1"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-danger w-60 py-2">Unavailable</span></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">11</th>
                                        <td class="align-middle">pr0012</td>
                                        <td class="align-middle"><img src="./img/product/product-12.jpg" width="70px"
                                                alt="product-12"></td>
                                        <td class="align-middle">Black Shoe</td>
                                        <td class="align-middle">$99</td>
                                        <td class="align-middle"><span
                                                class="badge badge-danger w-60 py-2">Unavailable</span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table End -->



    <!-- Bootstrap js -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <!-- OWL Car -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Show More js -->
    <script src="js/showMoreItems.min.js"></script>
    <!-- Data TAble -->
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Theme js -->
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>