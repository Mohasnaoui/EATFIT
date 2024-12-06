<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
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
            <li class="active">
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
            <li >
                <a href="<?= base_url('admin/ingred'); ?>">
                <i class='bx bxs-basket'></i>
                    <span class="text"> Ingrediant </span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/logout" class="logout">
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

        <main>
            <div id="dashboard" class="content-section">
                <div class="head-title">
                    <div class="left">
                        <h1>Dashboard</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                        </ul>
                    </div>
                </div>

                <ul class="box-info">
                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3>1020</h3>
                            <p>New USERS</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3>2834</h3>
                            <p>USERS</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bx-money'></i>
                        <span class="text">
                            <h3>2543</h3>
                            <p>Total Sales</p>
                        </span>
                    </li>
                </ul>
            </div>

            <div id="orders" class="content-section">
                <div class="head-title">
                    <div class="left">
                        <h1>USERS</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">USERS</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                        </ul>
                    </div>
                </div>

                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Recent USER</h3>
                            <form id="user-search-form" action="#">
                                <div class="form-input">
                                    <input type="search" name="search" aria-label="Search" placeholder="Search" class="search-input">
                                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                                </div>
                            </form>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>phone number</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p>hajr</p></td>
                                    <td>0622456780</td>
                                    <td><span class="status completed">Completed</span></td>
                                </tr>
                                
                                <tr>
                                    <td><p>Imane</p></td>
                                    <td>0678431225</td>
                                    <td><span class="status process">In Process</span></td>
                                </tr>
                                <tr>
                                    <td><p>Ahmed</p></td>
                                    <td>0712667980</td>
                                    <td><span class="status canceled">canceled</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="todo">
                        <div class="head">
                            <h3>To-do List</h3>
                        </div>
                        <form id="todo-form">
                            <input type="text" id="new-todo" placeholder="Add a new task">
                            <button type="submit">Add</button>
                        </form>
                        <ul class="todo-list" id="todo-list" >
                            <!-- Initial to-dos -->
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <script src="script.js"></script>
</body>
</html>
