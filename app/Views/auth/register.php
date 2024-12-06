<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>S'inscrire</h2>

        <!-- Affichage des erreurs de validation -->
        <?php if (session()->has('error')): ?>
            <p><?= session()->get('error')?></p>
        <?php endif; ?>

        <!-- Formulaire d'inscription -->
        <form action="/utilisateur/add" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= old('nom') ?>" required>
                <?php if (isset($errors['nom'])): ?>
                    <div class="alert alert-danger"><?= esc($errors['nom']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                <?php if (isset($errors['email'])): ?>
                    <div class="alert alert-danger"><?= esc($errors['email']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                <?php if (isset($errors['mot_de_passe'])): ?>
                    <div class="alert alert-danger"><?= esc($errors['mot_de_passe']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="mot_de_passe_confirmation">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required>
                <?php if (isset($errors['mot_de_passe_confirmation'])): ?>
                    <div class="alert alert-danger"><?= esc($errors['mot_de_passe_confirmation']) ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
