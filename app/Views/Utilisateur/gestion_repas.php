<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes Repas</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch:700|Open+Sans" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" type="text/css">
    <link rel="icon" type="image/png" href="images/img-cooking-icon.png">
</head>

<body>
<nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="site-logo navbar-item" href="#">
            Mes Repas
            </a>
            <div class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="start-menu-ideas">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </div>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a id="start-menu-ideas" class="navbar-link" href="#">
                        Starter Meal Ideas
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <a id="search-sheet-pan" data-id="Sheet Pan Recipes" class="navbar-item quickPicks" href="#">
                            Sheet Pan Recipes
                        </a>
                        <a id="search-15-min" data-id="15 Minute" class="navbar-item quickPicks" href="#">
                            15-Min Cooking Dinner
                        </a>
                        <hr class="navbar-divider">
                        <a id="search-random-recipe" class="navbar-item is-active" href="#">
                            Random recipe!
                        </a>
                    </div>
                </div>
            </div>
            <div class="navbar-end">
    <div class="navbar-item">
        <div class="field is-grouped">
           
            <!-- Bouton "Se déconnecter" ajouté -->
            <p class="control">
                <a href="<?= base_url('/utilisateur/logout') ?>" class="button logout-btn">
                    <span class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span>
                        Se déconnecter
                    </span>
                </a>
            </p>
        </div>
    </div>
</div>

        </div>
    </nav>
<div class="container mt-5">

    <!-- Message flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Navbar (inchangée) -->
    <nav class="navbar is-transparent">
        <!-- Navbar content here -->
    </nav>

    <!-- Hero + search bar (inchangé) -->
    <section id="start-search" class="hero is-medium is-white">
        <div class="hero-body">
            <div class="container">
                <h1 class="site-logo title is-1">
                Mes Repas
                <p class="subtitle">
                Vous préparerez et trouverez de délicieux repas que  <strong> VOUS</strong>  apprécierez !
                </p>
            </div>
        </div>
    </section>
    <section id="site-header" class="hero is-large" >
        <div class="hero-body">
            <div class="container">
                <div class="columns is-mobile is-centered">
                    <!-- Formulaire d'ajout de repas -->
                    <div class="column is-three-quarters-mobile is-half-desktop">
                    <form method="post" action="<?= base_url('/utilisateur/ajouterRepas') ?>" class="mb-4">
    <div class="columns">
        <div class="column is-two-thirds">
            <input type="text" name="nom" class="input" placeholder="Nom du repas" required>
        </div>
        <div class="column is-one-third">
            <div class="select">
                <select name="jour" required>
                    <option value="Monday">Lundi</option>
                    <option value="Tuesday">Mardi</option>
                    <option value="Wednesday">Mercredi</option>
                    <option value="Thursday">Jeudi</option>
                    <option value="Friday">Vendredi</option>
                    <option value="Saturday">Samedi</option>
                    <option value="Sunday">Dimanche</option>
                </select>
            </div>
        </div>
        <div class="column is-one-third">
            <button type="submit" class="button is-primary is-fullwidth">Ajouter un repas</button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Liste des Repas -->
    <!-- Liste des Repas -->
<section class="hero is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <!-- Tableau des repas -->
                <div class="column is-half">
                    <table id="weekly-plan" class="table is-striped is-hoverable js-table-data">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th><i class="fas fa-utensils"></i> Recipes</th>
                                <th><i class="far fa-comments"></i> Comments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($daysOfWeek as $day): 
                                $repasDuJour = array_filter($repas, fn($repasItem) => $repasItem['jour'] === $day);
                            ?>
                                <tr>
                                    <th><?= $day ?></th>
                                    <td>
                                        <ul>
                                            <?php foreach ($repasDuJour as $repasItem): ?>
                                                <li>
                                                    <a href="javascript:void(0)" class="has-text-link" onclick="showIngredients(<?= $repasItem['id'] ?>)">
                                                        <?= esc($repasItem['nom']) ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td>
                                        <?php foreach ($repasDuJour as $repasItem): ?>
                                            <a href="<?= base_url('/utilisateur/supprimerRepas/' . $repasItem['id']) ?>" class="has-text-danger">
                                                <i class="fas fa-trash"></i>  <?= esc($repasItem['nom']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tableau des ingrédients -->
                <div class="column is-half">
                    <h3 class="subtitle">Ingrédients</h3>
                    <div id="weekly-planner-body" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Fonction pour afficher les ingrédients d'un repas
    function showIngredients(repasId) {
    const container = document.getElementById('weekly-planner-body');
    
    // Affiche la section des ingrédients si elle est masquée
    if (container.style.display === 'none') {
        container.style.display = 'block';
    }

    container.innerHTML = '<p>Chargement des ingrédients...</p>'; // Message de chargement

    // Effectuer une requête AJAX pour récupérer les ingrédients et les totaux
    fetch(`<?= base_url('/utilisateur/getIngredients/') ?>${repasId}`)
        .then(response => response.json())
        .then(data => {
            container.innerHTML = ''; // Effacer le message de chargement

            if (data.ingredients && data.ingredients.length > 0) {
                // Afficher les ingrédients
                const list = document.createElement('ul');
                data.ingredients.forEach(ingredient => {
                    const item = document.createElement('li');
                    item.textContent = `${ingredient.nom} - ${ingredient.quantite}g`;
                    list.appendChild(item);
                });
                container.appendChild(list);

                // Afficher les totaux nutritionnels
                const totaux = data.totaux;
                if (totaux) {
                    const totalsDiv = document.createElement('div');
                    totalsDiv.innerHTML = `
                        <h4>Totaux nutritionnels :</h4>
                        <ul>
                            <li>Calories : ${totaux.total_calories.toFixed(2)} kcal</li>
                            <li>Glucides : ${totaux.total_carbs.toFixed(2)} g</li>
                            <li>Protéines : ${totaux.total_proteins.toFixed(2)} g</li>
                        </ul>
                    `;
                    container.appendChild(totalsDiv);
                }
            } else {
                container.innerHTML = '<p>Aucun ingrédient trouvé pour ce repas.</p>';
            }
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des données :', error);
            container.innerHTML = '<p>Erreur lors du chargement des données.</p>';
        });
}

</script>


    <!-- Liste des Ingrédients -->
    <section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h2 class="title">Liste des Ingrédients</h2>
            <table class="table is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Calories (pour 100g)</th>
                        <th>Glucides (g)</th>
                        <th>Protéines (g)</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingredients as $ingredient): ?>
                        <tr>
                            <td><?= esc($ingredient['nom']) ?></td>
                            <td><?= esc($ingredient['calories_100g']) ?> kcal</td>
                            <td><?= esc($ingredient['carbs']) ?> g</td>
                            <td><?= esc($ingredient['prot']) ?> g</td>
                            <td><?= esc($ingredient['type']) ?></td>
                            <td>
                                <img src="<?= base_url(esc($ingredient['imagepath'])) ?>" alt="<?= esc($ingredient['nom']) ?>" style="width: 50px; height: auto;">
                            </td>
                            <td>
                                <!-- Lien pour ajouter cet ingrédient à un repas -->
                                <form method="post" action="<?= base_url('/utilisateur/ajouterIngredient/' . $ingredient['id']) ?>">
                                    <div class="field">
                                        <label class="label">Quantité (g)</label>
                                        <div class="control">
                                            <input type="number" name="quantite" class="input" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Sélectionner un repas</label>
                                        <div class="control">
                                            <select name="repas_id" class="select" required>
                                                <?php foreach ($repas as $repasItem): ?>
                                                    <option value="<?= esc($repasItem['id']) ?>"><?= esc($repasItem['nom']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="button is-success">Ajouter à un repas</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


</div>

</body>
</html>
