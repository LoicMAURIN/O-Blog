<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Déclaration de notre font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Ma feuille de style pour mon blog -->
  <link rel="stylesheet" href="../integration-html-css/css/blog.css">

  <title>oBlog</title>
</head>

<body>

  <!-- HEADER -->
  <header>
    <!-- NAV -->
    <nav class="navbar navbar-expand-md navbar-light">
      <div class="container-fluid">  
      <!--
        Nous sommes en mobile first : par défaut notre menu est masqué !
        Je souhaite qu'il s'affiche au dela (= à partir de) d'une certainne largeur.
        navbar-expand-xxx permet d'afficher le menu en entier.
        xxx correspond à une taille (media-query) définie dans Bootstrap.
          sm => 576px
          md => 768px
          lg => 992px
          xl => 1200px
        -->
      <a class="navbar-brand" href="./">A la dérive</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Cette partie va automatique être masquée en version mobile -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav ">

          <!-- on boucle sur le tableau des catehories pour afficher dynamiquement la liste des categories -->
          <?php foreach ($categoryList as $categoryId => $category) : ?>
            <!-- $categoryList est un tableau de chaines de caractères
            donc $category contient directement le nom de la catégorie -->
            <li class="nav-item">
                <!-- chaque lien pointe vers index.php mais en signalant qu'on veut la page catégorie et en précisant aussi qu'on veut la catégorie sur laquelle on a cliqué donc fournir son identifiant -->
                <a class="nav-link" href="index.php?page=category&id=<?= $categoryId ?>">
                <?php echo $category->getName() ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div> <!-- fin container fluid-->
  </nav>
    <section class="text-center">
      <h1>A la dérive</h1>
      <hr />
      <p>
        Un blog collaboratif de développeurs web dérivant délibérément au milieu de l'espace
      </p>
    </section>
  </header>

  <!-- Mon container (avec une max-width) dans lequel mon contenu va être placé: https://getbootstrap.com/docs/5.0/layout/containers -->
  <div class="container">
    <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/5.0/layout/grid/ -->
    <div class="row">