<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
			width: 30rem;
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(164, 214, 171, 0.1);
        }
        .card-body {
            padding: 3rem;
        }
        .card-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }
        .form-control {
            width: 100%;
            padding: 1.5rem;
            font-size: 1.2rem;
            border: 2px solid #1d975a;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #46bea0;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 1.5rem 2.5rem;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #217250;
        }
    </style>
</head>
<body>
<?php if (isset($validation)) : ?>
        <div > <?= $validation->listErrors()   ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
    <div class="alert alert-success">
        <p><?= esc($error) ?></p>
    </div>
<?php endif; ?>
    <section class="h-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-18" style="max-width: 100%;">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h1 class="card-title">Login</h1>
                            <form method="POST" action="/form1" class="needs-validation" novalidate autocomplete="off">
                                <div class="mb-4">
                                    <label for="email" class="form-label">Login</label>
                                    <input id="email" type="text" class="form-control" name="Login" value="" required autofocus>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                                     
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
