<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    //importar conexion
require "includes/config/database.php";
$db = connectDB();

// /consultar
$query = "SELECT * FROM labs WHERE id = {$id}";

// /resultado
$resul = mysqli_query($db, $query);
$lab = mysqli_fetch_assoc($resul); //tenemos todo el contenido del registro

    // require 'includes/funciones.php';
    // incluirTemplate('header'); 
?>



<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Mono&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  


  <div class="untree_co-section untree_co-section-4 pb-0"  id="portfolio-section">
    <div class="container">
      <div class="portfolio-single-wrap unslate_co--section" id="portfolio-single-section">

        <div class="portfolio-single-inner">
          <h2 class="heading-portfolio-single-h2 text-black"><?php echo ucfirst($lab['name']); ?></h2>

          <div class="row mb-5 align-items-stretch">

            <div class="col-lg-6 mb-5 mb-lg-0">
              <img src="images/<?php echo $lab['image']; ?>" alt="Image" class="img-fluid">
              <img src="images/<?php echo $lab['image2']; ?>" alt="Image" class="img-fluid mt-3">
              <img src="images/<?php echo $lab['image3']; ?>" alt="Image" class="img-fluid mt-3">
            </div>

            <div class="col-lg-6 pl-lg-5">
              <div class="row mb-3">

                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                  <div class="detail-v1">
                    <span style="font-size: 24px;" class="detail-label">Visit</span>
                    <span style="font-size: 24px;" class="detail-val"><a href="<?php echo $lab['link']; ?>"><?php echo $lab['link']; ?></a></span>
                  </div>
                </div>
              </div>

              <p style="font-size: 24px;" class="mb-3"><?php echo $lab['description1']; ?></p>
              <p style="font-size: 24px;"><?php echo $lab['description2']; ?></p>
              <div>
              <img 
                width="50px" 
                <?php echo $lab['tech'] ? 'src=images/'.$lab['tech'] . '.png' : null ?> alt="">
              <img 
                width="50px" 
                <?php echo $lab['tech2'] ? 'src=images/'.$lab['tech2'] . '.png' : null ?> alt="">
              <img 
                width="50px" 
                <?php echo $lab['tech3'] ? 'src=images/'.$lab['tech3'] . '.png' : null ?> alt="">
              </div>
              <button class="btn btn-dark mt-3" onclick="goBack()">Go Back</button>
            </div>

            
          </div>
        </div>
        

        <script>
          function goBack() {
              window.history.back();
          }
        </script>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/wave-animate.js"></script>
    <script src="js/circle-progress.js"></script>
    <script src="js/imagesloaded.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/scrollmagic.animation.gsap.min.js"></script>


    <script src="js/custom.js"></script>

      </div>
    </div>

    <?php 

mysqli_close($db);
// incluirTemplate('footer'); 
?>