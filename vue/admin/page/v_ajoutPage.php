<?php if(isset($msgErreur)):?>
    <div class="boiteMessage msgErreur">
        <i class="las la-exclamation-triangle"></i>
        <p><?php echo $msgErreur; ?></p>
    </div>
<?php endif; ?>

<?php if(isset($msgInfo)):?>
    <div class="boiteMessage msgInfo">
        <i class="las la-info-circle"></i>
        <p><?php echo $msgInfo; ?></p>
    </div>
<?php endif; ?>

<div class="carte">
    <div class="carteEntete">
        <h1>Ajout page</h1>
    </div>
    <div class="carteContent">

        <form action="#" method="post">
            <label for="titrePage">Titre :</label>
            <input type="text" name="titrePage" required><br/>

            <label for="iconePage">Icône :</label>
            <input type="text" name="iconePage" required><br/>

            <label for="contenuPage">Contenu :</label>
            <textarea name="contenuPage" id="editor1" rows="10" cols="80"></textarea><br/>

            <label for="clePage">Page :</label>
            <input type="text" name="clePage" required><br/>

            <input class="bouton btnPost" type="submit">
        </form>

    </div>
</div>
<script src="../../../node_modules/ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
