<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0">
            <?php
            $sql = 'SELECT * FROM blog WHERE is_monset=1 and status=1 ORDER BY id LIMIT 1';
            $row = $db->select($sql); ?>
            <h1 class="display-4 fst-italic"><?= $row['title'] ?></h1>
            <p class="lead my-3"><?= substr($row["content"], 0, 100); ?>...</p>
            <p class="lead mb-0"><a href="?route=single&id=<?= $row['id'] ?>" class="text-white fw-bold">Continue
                    reading...</a></p>

        </div>
    </div>