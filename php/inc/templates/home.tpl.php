<!-- Par défaut (= sur mobile) mon element <main> prend toutes les colonnes (=12)
MAIS au dela d'une certaine taille, il n'en prendra plus que 9
https://getbootstrap.com/docs/5.0/layout/grid/#grid-options -->
<main class="col-lg-9">

    <?php foreach ($dataArticlesList as $articleId => $articleObject) : ?>
    <!-- on boucle sur le tableau des articles qui est dans data.php
    pour chaque article on affiche une card html  -->
        <article class="card">
        <div class="card-body">
            <h2 class="card-title"><a href="index.php?page=article&id=<?= $articleId ?>"><?= $articleObject->title ?></a></h2>
            <p class="card-text"><?= $articleObject->content ?></p>
            <p class="infos">
            Posté par <a href="#" class="card-link"><?= $articleObject->author ?></a> le <time datetime="2017-07-13"><?= $articleObject->getDateFr() ?></time> dans <a href="#"
                class="card-link">#<?= $articleObject->category ?></a>
            </p>
        </div>
        </article>
    <?php endforeach ?>

    <!-- Je met un element de navigation: https://getbootstrap.com/docs/5.0/components/pagination/ -->
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-between">
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-left"></i> Précédent</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivant <i class="fa fa-arrow-right"></i></a></li>
    </ul>
    </nav>

</main>

<aside class="col-lg-3">
    <!-- Champ de recherche: https://getbootstrap.com/docs/5.0/forms/input-group/ -->
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Rechercher un article..."
        aria-label="Rechercher un article..." aria-describedby="basic-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Allez</button>
    </div>
    </div>

    <!-- Catégories: https://getbootstrap.com/docs/5.0/components/card/#list-groups -->
    <div class="card">
    <h3 class="card-header">Catégories</h3>
    <ul class="list-group list-group-flush">

        <!-- on boucle sur le tableau des catehories pour afficher dynamiquement la liste des categories -->
        <?php foreach ($categoryList as $categoryId => $category) : ?>
            <!-- $categoryList est un tableau de chaines de caractères
            donc $category contient directement le nom de la catégorie -->
            <li class="list-group-item">
                <a href="index.php?page=category&id=<?= $categoryId ?>"><?= $category->getName() ?></a>
            </li>
        <?php endforeach ?>
    </ul>
    </div>

    <!-- Auteurs: https://getbootstrap.com/docs/5.0/components/card/#list-groups -->
    <div class="card">
    <h3 class="card-header">Auteurs</h3>
    <ul class="list-group list-group-flush">
        <?php foreach ($authorList as $authorId => $author) : ?>
            <li class="list-group-item">
                <a href="index.php?page=author&id=<?= $authorId ?>"><?= $author->getName() ?></a>
            </li>
        <?php endforeach ?>
    </ul>
    </div>

</aside>





