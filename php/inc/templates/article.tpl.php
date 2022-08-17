<article class="card">
    <div class="card-body">
    <!-- la variable $articleToDisplay est créé dans index.php et elle est remplie par l'article qui se trouve dans le tableau des articles à l'index correspondant à l'id passé en paramètre GET  -->
    <h2 class="card-title"><?= $articleToDisplay->title ?></h2>
    <p class="infos">
        Posté par <a href="#" class="card-link"><?= $articleToDisplay->author ?></a> le <time datetime="2017-07-13"><?= $articleToDisplay->getDateFr() ?></time> dans <a href="#"
        class="card-link">#<?= $articleToDisplay->category ?></a>
    </p>
    <p class="card-text"><?= $articleToDisplay->content ?></p>
    </div>
</article>
        
<!-- Je met un element de navigation: https://getbootstrap.com/docs/5.0/components/pagination/ -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-between">
        <li class="page-item"><a class="page-link" href="index.php"><i class="fa fa-arrow-left"></i> Retour à l'accueil</a></li>
    </ul>
</nav>



