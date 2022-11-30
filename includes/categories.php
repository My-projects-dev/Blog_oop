<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <?php
        $sql = 'SELECT * FROM categories WHERE is_menu=1 and status=1';
        $db = new DB();
        $result = $db->selectAll($sql);

        foreach ($result as $key => $row):?>
            <a class="p-2 link-secondary" href="?route=category&catid=<?= $row['id'] ?>"><?= $row['title'] ?></a>
        <?php
        endforeach;
        ?>
    </nav>
</div>
</div>