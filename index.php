<?php


// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements



include('db.php');
include('menu.php');
include('menuManager.php');

$dbo = new db();
$db = $dbo->db;

$menu = new menu();
$menuManager = new menuManager($db);

/*if(!empty($_POST['name']) && !is_int($_POST['parent']))
{
    $menuManager->ajouterMenu($_POST['name'],$_POST['parent']);
    echo 'menu ajouté';
}

*/

$liste_menu = $menuManager->getListMenu();

$html = $menu->afficher_menu(0,0,$liste_menu);
echo $html;



?>


<!--

<form action="" method="post">
    <input type="text" name="name" placeholder="nom"/>
    <select name="parent">
        <option value=0>0</option>
        <?php foreach($liste_menu as $menu) : ?>
            <option value=<?=$menu['id']?>><?= $menu['id'] ?></option>
        <?php endforeach ?>
    </select>

    <input type="submit" value="envoyer"/>
</form>
-->