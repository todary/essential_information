<?php include "views/layout/header.php";?>
<!-- /.row -->
    <section class="company-signup-form1-cont container beHidden beVisible">
        <ul class="list-group">
            <?php foreach($result as $key=>$value): ?>
                <li class="list-group-item"><?=$value['meta_key'] ?> : <?=$value['meta_value'] ?></li>
            <?php endforeach; ?>

        </ul>
        <a href="<?= Index ?>UserController/adduserAction" class="btn btn-secondary">Chang</a>

    </section>

<?php include "views/layout/footer.php";?>