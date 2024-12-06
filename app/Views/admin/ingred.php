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
            <li>
                <a href="<?= base_url('admin/useri'); ?>" class="nav-link1">
                <i class='bx bxs-user'></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/analytics'); ?>">
                    <i class='bx bx-bar-chart-alt-2'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li class="active">
                <a href="<?= base_url('admin/ingred'); ?>">
                <i class='bx bxs-basket'></i>
                    <span class="text"> Ingrediant </span>
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
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
    </nav>
    <section>
        <div class="container-fluid" style="margin-right: 40%; width: 70%;">
            <div class="row">
                <div class="col-lg-10 col-md-8 ml-auto">
                    <div class="row align-items-center pt-md-5 mt-md-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-title text-center mt-3">
                                <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
                                    <h3><strong>ADD INGREDIANT</strong></h3>
                                </div>
                                <div class="card-body">
                                    <form action="/ingredient" method="Post" >
                                        <div class="form-group">
                                            <label for="productname"><strong>INGREDIANT NAME:</strong></label>
                                            <input type="text" class="form-control" id="productname" name="ingrediantname" placeholder="Enter Ingrediant Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="designation"><strong>TYPE:</strong></label>
                                            <input type="text" class="form-control" id="designation" name="type" placeholder="Enter Type Ingrediant " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="productprice"><strong>CALORIES:</strong></label>
                                            <input type="text" class="form-control" id="productprice" name="cal" placeholder="Enter Calories" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity"><strong>CARBOHYDRATES:</strong></label>
                                            <input type="number" class="form-control" id="quantity" name="crabs" placeholder="Enter Crabs" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity"><strong>PROTEIN:</strong></label>
                                            <input type="number" class="form-control" id="protin" name="prot" placeholder="Enter Protein" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="imagepath"><strong>IMAGE Path:</strong></label>
                                            <input type="text" class="form-control" id="imagepath" name="imagepath" placeholder="Enter Image Path" required>

                                        </div>
                                        <button class="btn btn-dark mt-5 mx-auto d-block" type="submit" name="add"><strong>Add INGREDIANT</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Bootstrap js -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<!-- OWL Car -->
<script src="js/owl.carousel.min.js"></script>
<!-- Show More js -->
<script src="js/showMoreItems.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Theme js -->
<script type="text/javascript" src="js/main.js"></script>
<script src="script.js"></script>
</body>
</html>
