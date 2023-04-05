
<?php
$productsArray = array_map('str_getcsv', file('products.csv'));
$categoriesArray = array();


foreach ($productsArray as $k=>$v) {
  $categoriesArray[] = $v[0];
}

$categoriesArray = array_unique($categoriesArray);
$categoriesArray = array_values($categoriesArray);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php readfile("title.txt");?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .bg-green {
        background-color: #00b300!important;
      } 
      .bg-green-2 {
        background-color: #004d00!important;
      } 
      .header-text {
        color: #FFF;
      }
      .card-title {
        font-weight: bold;
      }


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>

  <div class="navbar bg-green-2 bg-dark shadow-sm">
    <div class="container mt3">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>-->
        <strong class="header-text"><?php readfile("title.txt");?></strong>
      </a>
    </div>
  </div>
</header>
<!--<pre>
<?php print_r($productsArray);?>
<main>
  </pre>-->

  <section class="py-5 text-center container">
    <div class="row">
      <div class="col-lg-8 col-md-8 mx-auto">
        <h1 class="fw-light"><?php readfile("title.txt");?></h1>
                <p class="lead text-muted"><?php readfile("text.txt");?></p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">

    <?php
    if (empty($categoriesArray)) {
      ?>
    <div class="row">
      <div class="col-lg-8 col-md-8 mx-auto text-center">
        <p>No categories found</p>
      </div>
    </div>
    <?php     
    }
    else {
    foreach ($categoriesArray as $catKey => $catVal) {
    ?>
    <div class="container">
      <h2 class="p-2 border-bottom"><?php echo ucfirst($catVal); ?></h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 mb-5">
<?php foreach ($productsArray as $prodKey => $prodVal) { 
        if ($productsArray[$prodKey][0] == $categoriesArray[$catKey]) {?>
              <div class="col">
                <div class="card shadow-sm">
                  <?php $image = (file_exists('images/'.$productsArray[$prodKey][5])) ? $productsArray[$prodKey][5] : 'placrreholder.png'; ?>
                  <img class="img-fluid img-thumbnail" src="images/<?php echo $image;?>" />

                  <div class="card-body">
                    <p class="card-title"><?php echo $productsArray[$prodKey][1]; ?></p>

                    <p class="card-text"><?php echo $productsArray[$prodKey][2]; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">In Stock: <?php echo ucfirst($productsArray[$prodKey][4]);?></small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">Price: <?php echo $productsArray[$prodKey][3];?></small>
                    </div>
                  </div>
                </div>
              </div>
<?php 
        }
      }?>
      </div>
      
    </div>
<?php }//end foreach 
}//end if else?>
  </div>

</main>

<footer class="text-muted py-5 bg-green-2">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
