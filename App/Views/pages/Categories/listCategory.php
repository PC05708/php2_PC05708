<table class="table container">
    <thead>
        <tr>
            <th scope="col">
                <input type="checkbox" name="" id="">
            </th>
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Cập nhật</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $category) : ?>
                <tr>
                    <th scope="col">
                        <input type="checkbox" name="" id="">
                    </th>
                    <td><?= 1 ?></td>
                    <td><?= $category['name'] ?? "" ?></td>
                    <td>
                        <a href="#!">Edit</a>
                        <a href="#!">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif; ?>
    </tbody>
</table>