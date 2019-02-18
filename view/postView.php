<?php $title = 'Blog'; ?>
<?php ob_start(); ?>
        
        <h1>Mon super Roman !</h1>
        <p><a href="index.php">Retour à la liste des chapitres</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($chapt['title']) ?>
                <?= htmlspecialchars($chapt['number']) ?>
                <em>le <?= $chapt['creation_date'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($chapt['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>
        <form action="index.php?action=addComment&post=<?= $chapt['id'] ?>" method="post"> 
        <div>
            <label for="author">Pseudo</label><br/>
            <input type="text" id="author" name="author">
        </div>
        <div>
            <label for="comment">Message</label><br/>
            <textarea id="comment" name="comment"></textarea>

        </div>
        <div>
            <input type="submit" />
</div>
</form>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['title']) ?></strong> le <?= htmlspecialchars($comment['creation_date']) ?></p>
            <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
<?php
        }
?>


<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>