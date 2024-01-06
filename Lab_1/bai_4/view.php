<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table container">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" name="" id="">
                </th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php if (!empty($users)) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" name="" id="">
                        </th>
                        <td><?= $user['name'] ?? "" ?></td>
                        <td><?= $user['email'] ?? "" ?></td>
                        <td>
                            <a href="#!">Edit</a>
                            <a href="#!">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>