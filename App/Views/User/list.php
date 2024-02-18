<table class="table container container-custom justify-content-center">
    <h1 class="text-center m-2">Quản lí người dùng</h1>
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
                        <a href="<?= _WEB_ROOT . '/User/edit/?id=' . $user['id'] ?>">Edit</a>
                        <a href="<?= _WEB_ROOT . '/User/delete/?id=' . $user['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif; ?>
    </tbody>
</table>