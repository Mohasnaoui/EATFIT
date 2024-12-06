<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles inclus ci-dessous */
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" data-section="stock">
                    <i class="fas fa-boxes"></i> Stock des Produits
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" data-section="orders">
                    <i class="fas fa-shopping-cart"></i> Commandes
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" data-section="purchases">
                    <i class="fas fa-receipt"></i> Achats
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" data-section="logout">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                <div class="ml-auto">
                    <span class="navbar-text">Admin: John Doe</span>
                </div>
            </nav>

            <div class="container-fluid">
                <div id="stock" class="section-content" style="display:none;">
                    <h2>Stock des Produits</h2>
                    <table class="table table-hover mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Produit A</td>
                                <td>50</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>Produit B</td>
                                <td>20</td>
                                <td>$150</td>
                            </tr>
                            <tr>
                                <td>Produit C</td>
                                <td>30</td>
                                <td>$200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="orders" class="section-content" style="display:none;">
                    <h2>Commandes</h2>
                    <table class="table table-hover mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Client</th>
                                <th scope="col">Date</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="order-12345">
                                <td>John Smith</td>
                                <td>2024-05-01</td>
                                <td>En attente</td>
                                <td>$300</td>
                                <td>
                                    <button class="btn btn-success btn-confirm" data-order-id="12345">Confirmer</button>
                                    <button class="btn btn-danger btn-delete" data-order-id="12345">Supprimer</button>
                                </td>
                            </tr>
                            <tr id="order-12346">
                                <td>Jane Doe</td>
                                <td>2024-05-02</td>
                                <td>En cours</td>
                                <td>$150</td>
                                <td>
                                    <button class="btn btn-success btn-confirm" data-order-id="12346">Confirmer</button>
                                    <button class="btn btn-danger btn-delete" data-order-id="12346">Supprimer</button>
                                </td>
                            </tr>
                            <tr id="order-12347">
                                <td>Mike Johnson</td>
                                <td>2024-05-05</td>
                                <td>En attente</td>
                                <td>$250</td>
                                <td>
                                    <button class="btn btn-success btn-confirm" data-order-id="12347">Confirmer</button>
                                    <button class="btn btn-danger btn-delete" data-order-id="12347">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="purchases" class="section-content" style="display:none;">
                    <h2>Achats</h2>
                    <table class="table table-hover mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fournisseur</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fournisseur A</td>
                                <td>Produit A</td>
                                <td>50</td>
                                <td>2024-05-01</td>
                                <td>$5000</td>
                            </tr>
                            <tr>
                                <td>Fournisseur B</td>
                                <td>Produit B</td>
                                <td>20</td>
                                <td>2024-05-02</td>
                                <td>$3000</td>
                            </tr>
                            <tr>
                                <td>Fournisseur C</td>
                                <td>Produit C</td>
                                <td>30</td>
                                <td>2024-05-03</td>
                                <td>$4500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.list-group-item').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('data-section');
                
                document.querySelectorAll('.section-content').forEach(section => {
                    section.style.display = 'none';
                });
                
                const sectionToShow = document.getElementById(sectionId);
                sectionToShow.style.display = 'block';
                sectionToShow.classList.add('active');
            });
        });

        document.getElementById('stock').style.display = 'block';

        document.querySelectorAll('.btn-confirm').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                alert('Commande ' + orderId + ' confirmée.');
            });
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                if (confirm('Êtes-vous sûr de vouloir supprimer la commande ' + orderId + '?')) {
                    document.getElementById('order-' + orderId).remove();
                    alert('Commande ' + orderId + ' supprimée.');
                }
            });
        });

        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('wrapper').classList.toggle('toggled');
        });
    </script>
</body>
</html>
