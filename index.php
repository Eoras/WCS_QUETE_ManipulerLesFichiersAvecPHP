<?php include('inc/head.php');
require_once('inc/fonctions.php');
require_once('inc/traitement.php');

lister('./files');

if (isset($_GET['f'])) {
    $fichier = $_GET['f'];
    if(is_file($fichier))
        $contenu = file_get_contents($fichier);
}
if(!empty($contenu)) : ?>
    <div class="contenu">
        <form action="#fileContent" method="POST">
            <textarea name="content" id="fileContent" style="width: 100%"
                      rows="10"><?= $contenu ?></textarea>
            <button type="submit" name="file" class="btn btn-secondary" value="<?= $fichier ?>">Enregistrer</button>
            <a href="./" class="btn btn-secondary float-right">Fermer</a>
            <div class="clearfix"></div>
        </form>
    </div>
<?php endif; ?>

<div class="modal fade text-light" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <span class="text-light">Suppression</span>
            </div>
            <div class="modal-body">
                Êtes-vous sûr(e) ?
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <input type="hidden" name="file" value="">
                    <button class="btn btn-dark" name="delete" value="delete">OUI</button>
                    <button class="btn btn-dark" data-dismiss="modal">NON</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-light" id="showPicture" tabindex="-1" role="dialog" aria-labelledby="showPictureLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <img src="https://via.placeholder.com/1000x1000" alt="" class="img-fluid">
        </div>
    </div>
</div>

<?php include('inc/foot.php'); ?>
