<?php

function remove($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object))
                    remove($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        if (!rmdir($dir)) {
            echo "Dossier non supprimer à cause d'une erreur";
        } else {
            echo "Dossier supprimé avec succès";
        }
    }
}

function lister($dir)
{
    echo "<ul>";
    $folder = opendir($dir);

    while ($file = readdir($folder)) {
        if ($file !== "." && $file !== "..") {
            $pathFile = $dir . '/' . $file;
            $mimeType = str_replace('/', '-', mime_content_type($pathFile));
            ?>

        <li class="text-dark <?= is_dir($pathFile) ? "font-weight-bold" : "list-unstyled" ?>">
            <img src="assets/images/fileType/<?= $mimeType ?>.png" class="fileType" alt="<?= $mimeType ?>"
                 title="<?= $mimeType ?>">

            <?php
            switch ($mimeType) {
                case 'inode-x-empty':
                    {
                        echo $file;
                        break;
                    }
                case 'directory':
                    {
                        echo $file;
                        break;
                    }
                case "text-plain" :
                    {
                        echo "<a href='?f=$pathFile#fileContent'>$file</a>";
                        break;
                    }
                case "text-html" :
                    {
                        echo "<a href='?f=$pathFile#fileContent'>$file</a>";
                        break;
                    }
                case "image-jpeg" :
                    {
                        echo "<a href='#' data-toggle='modal' data-target='#showPicture' data-file='$pathFile'>$file</a>";
                        break;
                    }
                default:
                    {
                        echo "$file";
                        break;
                    }
            }

            if (!is_dir($pathFile)) {
                echo "<br><p class='ml-5 mb-0 small text-muted' style='vertical-align: top'>";
                echo "Modifié le : " . date("d/m/Y - H:i:s", filemtime($pathFile));
                echo "</small>";
            }
            echo "<a href='#' class='ml-1 text-muted' data-toggle='modal' data-target='#confirmationModal' title='Supprimer' data-file='$pathFile'><i class='far fa-trash-alt mr-3'></i></a>";

            echo "</li>";
            if (filetype($pathFile) == 'dir') {
                lister($pathFile);
            }
        }
    }
    closedir($folder);
    echo "</ul>";
}