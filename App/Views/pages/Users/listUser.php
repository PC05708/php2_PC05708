<table class="table container">
    <thead>
        <tr>
            <th scope="col">
                <input type="checkbox" name="" id="">
            </th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Email</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $user) : ?>
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