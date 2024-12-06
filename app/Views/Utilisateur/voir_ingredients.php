<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingredients List</title>
    <!-- Add any stylesheets or JavaScript here -->
</head>

<body>
    <div class="container mt-5">
        <h2>Ingredients List</h2>
        <table class="table is-striped is-hoverable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Calories per 100g</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingredients as $ingredient): ?>
                    <tr>
                        <td><?= esc($ingredient['nom']) ?></td>
                        <td><?= esc($ingredient['calories_100g']) ?> kcal</td>
                        <td>
                            <!-- You can add actions like Edit or Delete here -->
                            <a href="#" class="button is-warning">Edit</a>
                            <a href="#" class="button is-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
