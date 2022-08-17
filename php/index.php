<?php

// index.php est le fichier point d'entrée unique de notre site
// => quelle que soit la page demandée, on passe toujours et
// uniquement par index.php
// Avantage, on factorise une partie du code qui est nécessaire à
// toutes les pages, par exemple l'inclusion de la classe Article
// ou l'inclusion des templates header et footer

// ===========================================================
// Inclusion des fichiers nécessaires
// ===========================================================

require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Category.php';
require __DIR__ . '/inc/classes/Author.php';


// Récupération du tableau Php contenant la liste
// d'objets Article
require __DIR__ . '/inc/data.php';
// on récupère les données de data.php dans une variable (immaginons que data.php est une base de données externe à notre code, c'est pour ça qu'on recrée ici une variable)
$articlesList = $dataArticlesList;
$categoryList = $dataCategoriesList;
$authorList = $dataAuthorsList;

// ===========================================================
// Récupération des données nécessaires à toutes les pages
// du site (pour le moment on ne récupère que la page à
// afficher, mais d'autres données viendront se rajouter
// plus tard)
// ===========================================================

// -----------------------------------------------------
// Récupération de la page à afficher
// -----------------------------------------------------

// Par défaut, on considère qu'on affichera la page d'accueil
$pageToDisplay = 'home';
// Mais si un paramètre 'page' est présent dans l'URL, c'est
// qu'on veut afficher une autre page
if (isset($_GET['page']) && $_GET['page'] !== '') {
    $pageToDisplay = $_GET['page'];
}

// ===========================================================
// Chaque page nécessite une préparation différente car elle
// affiche des informations différentes
// ===========================================================

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {
    // ------------------
    // Page home
    // ------------------

} else if ($pageToDisplay === 'article') {
    // ------------------
    // Page Article
    // oui mais lequel ??? => celui dont l'id est passé en paramètre get dans l'url
    // ------------------

    // On souhaite récupérer uniquement les données de l'article
    // à afficher
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($articleId !== false && $articleId !== null) {
        // on va chercher dan sle tableau des articles celui qui se trouve à l'index correspondant à l'id passé en param get
        $articleToDisplay = $articlesList[$articleId];
    } else {
        // Si l'id n'est pas fourni, on affiche la page d'accueil
        // plutôt que d'avoir un message d'erreur
        $pageToDisplay = 'home';
    }
} else if ($pageToDisplay === 'author') {
    // ------------------
    // Page Auteur
    // ------------------

    //  on recupere le paramètre GET id pour savoir quel auteur on va afficher
    $authorId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // On s'assure de ne pas tomber ni sur false, ni sur null
    if ($authorId !== false && $authorId !== null) {
        // on va chercher dans la liste des auteurs ($authorList), la ligne qui correspond à l'id récupéré en paramètre GET ($authorId)
        $authorToDisplay = $authorList[$authorId];

        // On prépare un tableau vide qui contiendra la liste
        // des articles de l'auteur à afficher
        $articleToDisplayForAuthorTemplate = [];

        // On parcourt le tableau de tous les articles
        foreach ($articlesList as $articleId => $article) {

            // Pour chaque article :
            // - si le nom de l'auteur de l'article qu'on est en train
            // de parcourir est identique au nom de l'auteur à afficher
            if ($article->author === $authorToDisplay->getName()) {

                // alors on ajoute cet article dans le tableau $currentAuthorArticlesList

                // Si on veut conserver l'association entre l'id de l'article
                // et l'objet article associé (utile notamment pour générer le
                // lien/url vers l'article en question)
                // alors on doit préciser l'id de l'élément ajouté dans le tableau
                $articleToDisplayForAuthorTemplate[$articleId] = $article;
            }
        }
    }
    else {
        // si c'est false ou null on affiche la home (car on a pas d'id d'auteur)
        $pageToDisplay = 'home';
    }

} else if ($pageToDisplay === 'category') {
    // ------------------
    // Page Catégorie
    // ------------------

    // on va recuperer en paramètre GET l'identifiant $id pour aller chercher dans la tableau des catégories celle qui se trouve à l'index $id
    // $id = $_GET['id']; meme chose avec filter_input : 
    $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($categoryId == false || $categoryId == null) {
        //  si jamais le filter_input renvoie false (c'est que le param n'est pas un int)
        //  OU QUE le filter_input renvoie null (c'est que le param id n'existait pas dans $_GET)
        //  on a pas d'identifiant de categorie donc on dit finalement la page à afficher sera la home
        $pageToDisplay = 'home';
    }
    else {
        //  si on a bien un id de categorie , on va chercher la categorie a afficher dans le tableau $categoryList
        $categoryToDisplay = $categoryList[$categoryId];
    }
}

// ===========================================================
// Affichage
// ===========================================================

// Rappel : les variables définies dans index.php, et dans les
// fichiers inclus par index.php (inc/data.php par exemple)
// seront accessibles dans le code des templates inclus
// ci-dessous

require __DIR__ . '/inc/templates/header.tpl.php';
require __DIR__ . '/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__ . '/inc/templates/footer.tpl.php';
