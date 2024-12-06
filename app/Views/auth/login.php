<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('auth/sing.css') ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
        <div class="front">
            <img src="<?= base_url('auth/img-burgercooking.png') ?>" alt="">
            <div class="text">
                <span class="text-1"><strong>Mes Repas</strong></span>
                <span class="text-2">Vous préparerez et trouverez de délicieux repas que <strong>VOUS</strong> apprécierez !</span>
            </div>
        </div>
    </div>
    <div class="forms">
        <div class="form-content">
            <div class="login-form">
                <div class="title"><strong>Login</strong></div>

                <!-- Messages de session -->
                <?php if (session()->has('succes')): ?>
                    <p class="alert alert-success"><?= session()->get('succes') ?></p>
                <?php endif; ?>

                <?php if (session()->has('error')): ?>
                    <p class="alert alert-danger"><?= session()->get('error') ?></p>
                <?php endif; ?>

                <!-- Formulaire de connexion -->
                <form action="/utilisateur/connexion" method="post">
                    <?= csrf_field() ?>
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Enter your email" id="email" name="email" value="<?= old('email') ?>" required>
                        <?php if (isset($errors['email'])): ?>
                            <div class="alert alert-danger"><?= esc($errors['email']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter your password" id="mot_de_passe" name="mot_de_passe" required>
                        <?php if (isset($errors['mot_de_passe'])): ?>
                            <div class="alert alert-danger"><?= esc($errors['mot_de_passe']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="text"><a href="#">Forgot password?</a></div>
                    <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
                </form>

                <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
