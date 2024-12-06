<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stylec.css">
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

        <main>
            
            </div>
            <div id="orders" class="content-section">
                <div class="head-title">
                    <div class="left">
                        <h1>USERS</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Users</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                        </ul>
                    </div>
                </div>

                <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Users</h3>
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
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($utilisateurs) && is_array($utilisateurs)): ?>
            <?php foreach ($utilisateurs as $utilisateur): ?>
                <tr>
                    <td><?= esc($utilisateur['nom']) ?></td>
                    <td><?= esc($utilisateur['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Aucun utilisateur trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>





    </div>
</div>

                    
    <script src="script.js"></script>
</body>
</html>
