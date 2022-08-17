<div class="container">
    <h1><?= $categoryToDisplay->getName() ?></h1>


    <!--  on veut afficher la liste des articles qui sont dans la categorie -->

    <?php 
    //  on boucle sur la liste de tous les articles 
    foreach ($dataArticlesList as $articleId => $articleObject) : 
        
        // pour chaque article :
        // SI la categorie de l'article est égale à la categorie courante $categoryToDisplay
        // alors j'affiche l'article, sinon je le l'affiche pas !
        if ($categoryToDisplay->getName() == $articleObject->category) : ?>
            <article class="card">
            <div class="card-body">
                <h2 class="card-title"><a href="index.php?page=article&id=<?=$articleId?>"><?= $articleObject->title ?></a></h2>
                <p class="infos">
                Posté par <a href="#" class="card-link"><?= $articleObject->author ?></a> le <time datetime="2017-07-13"><?= $articleObject->getDateFr() ?></time> dans <a href="#"
                    class="card-link">#<?= $articleObject->category ?></a>
                </p>
            </div>
            </article>
        <?php endif ?>

    <?php endforeach ?>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="index.php"><i class="fa fa-arrow-left"></i> Retour à l'accueil</a></li>
    </ul>
</nav>

