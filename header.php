<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LePays | Journal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBXT" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php wp_head(); ?>
</head>

<style>
  .navbar a {
    color: white !important;
  }

  a:hover {
    text-decoration: none !important;
  }

  .navbar-brand img {
    max-width: 100px;
    height: auto;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <?php if (has_custom_logo()) {
        the_custom_logo();
      } else { ?>
        <img src="https://i.imgur.com/ZQcxxtU.png" width="100px" alt="Logo du site">
      <?php } ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'main-menu',
          'menu_id' => 'primary-menu',
          'container' => 'ul',
          'menu_class' => 'navbar-nav',
          'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="nav-item"><a class="nav-link" href="/wp-lepays">Accueil</a></li><li class="nav-item"><a class="nav-link" href="' . get_category_link(get_cat_ID('Sports')) . '">Sports</a></li><li class="nav-item"><a class="nav-link" href="' . get_category_link(get_cat_ID('Cultures')) . '">Cultures</a></li><li class="nav-item"><a class="nav-link" href="' . get_category_link(get_cat_ID('Evenements à venir')) . '">A venir</a></li><li class="nav-item"><a class="nav-link" href="/wp-lepays/contact">Contact</a></li></ul>'
        )
      );
      ?>
    </div>
  </nav>
</body>

</html>