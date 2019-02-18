

<?php ob_start(); ?>

<h1>Mon super Roman !</h1>
<?php 
while ($chapt = $posts->fetch()) {
?>

<div class="news">
            <h3>
                <?= htmlspecialchars($chapt['title']); ?>
                <?= htmlspecialchars($chapt['number']); ?>
                <em>le <?= $chapt['creation_date']; ?></em>
            </h3>

            
            <p>
                <?= nl2br(htmlspecialchars($chapt['content'])); ?><br />
                <em><a href="index.php?action=post&id=<?= $chapt['id'];?>">Commentaires</a></em>
            </p>
</div>

<?php
    }
    $posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>
