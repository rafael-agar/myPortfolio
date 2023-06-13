<?php 
require 'includes/functions.php';
require 'includes/config/database.php';

$db = connectDB();

//consultar
$query = "SELECT * FROM my_portfolio";
$queryLabs = "SELECT * FROM labs";

//result
$result = mysqli_query($db,$query);
$resultLabs = mysqli_query($db,$queryLabs);

incluirTemplate('header');
?>


<br><br>
  <div class="untree_co-section pb-0 portfolio" id="home-section">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <h1 class="heading gsap-reveal-hero mb-3"><strong>Web<span class="text-primary">.</span> Developer</strong></h1>
          <h2 class="subheading gsap-reveal-hero mb-4">
            As a web developer with a passion for creativity and a deep understanding of the latest web development technologies, I bring a unique perspective to every project. 
          </h2>
             
        </div>
      </div>
      
    </div>
  </div>

    <!-- portfolio -->
    <div class="untree_co-section untree_co-section-4 pb-0 pt-5 "  id="portfolio-section">
        <div class="container">
    
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading gsap-reveal-hero mb-0"><strong>Portfolio</strong></h2>
            <p class="gsap-reveal-hero">My latest projects, reflecting my evolving skill set. Explore my innovative work and witness my growth as a web developer.</p>
            <div class="wave gsap-reveal-hero pb-3" >
              <svg>
                <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
              </svg>
            </div>
          </div> 
          <div class="relative"><div class="loader-portfolio-wrap"><div class="loader-portfolio"></div></div> </div>
          <div id="portfolio-single-holder"></div>

          <div class="portfolio-wrapper">
            <div id="posts" class="row">
            <?php while($element = mysqli_fetch_assoc($result)): ?>
              <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
                <a href="portfolio.php?id=<?php echo $element['id']; ?>" class="portfolio-item">
                  <div class="overlay">
                    <span class="wrap-icon icon-link2"></span>
                    <div class="portfolio-item-content">
                      <h3><?php echo $element['name']; ?></h3>
                      <p><?php echo $element['role']; ?>, <?php echo $element['client']; ?></p>
                    </div>
                  </div>
                  <img src="images/<?php echo $element['image']; ?>" class="lazyload  img-fluid" alt="Images" />
                </a>
              </div>
            <?php endwhile; ?>
            </div>
          
          </div>
    
            <!-- </div>
            </div> -->
          </div>
    </div>

    <!-- about -->
    <div class="untree_co-section pb-0" id="about-section">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-lg-7 mx-auto text-center author-wrap">
            <img width="180px" src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
            <h3 class="text-black h5 font-weight-bold mb-2 gsap-reveal-hero">Rafael Agar</h3>
            <p class="gsap-reveal-hero">Web Designer and Developer</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-7">

            <p class="gsap-reveal-hero">My passion for creativity and a deep understanding of the latest web development technologies, I bring a unique perspective to every project.</p>

            <p class="gsap-reveal-hero">My ability to adapt to new technology and embrace change allows me to deliver cutting-edge solutions that exceed the expectations of clients and end-users alike. With a strong foundation in coding languages and web development tools, I am able to create visually stunning, intuitive websites that deliver results.</p>

            <p class="gsap-reveal-hero">Overall, my drive for innovation and commitment to excellence make me a valuable asset to any team, and ensure my success in the industry.</p>

   
          </div>
        </div>
      </div>
    </div>

    <!-- services -->
    <div class="untree_co-section pb-0" id="services-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading gsap-reveal-hero mb-0"><strong>Services</strong></h2>
            <p class="gsap-reveal-hero">With an unwavering passion for problem-solving, I excel as a web developer, transforming intricate challenges into elegant solutions that propel businesses forward.</p>
            <div class="wave gsap-reveal-hero" >
              <svg>
                <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
              </svg>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/web-programming.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero">Web Developer</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/problem-solving.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero">Problem-Solving</h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/post-production.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero">Video Editor</h3>
            </div>
          </div>


        </div>
      </div>
    </div>


    <!-- experience -->
    <div class="untree_co-section pb-0" id="services-section">
      <div class="container">

        <div class="row mb-4">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading gsap-reveal-hero mb-0"><strong>Experience</strong></h2>
            <p class="gsap-reveal-hero">I have gained valuable professional experience in the web development industry through my contributions to the following companies:</p>
            <div class="wave gsap-reveal-hero" >
              <svg>
                <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
              </svg>
            </div>
          </div>
        </div>

        <div class="row">


          <div class="col " data-aos="fade-up" data-aos-delay="100">

            

            <div class="pb-3">
              <div>
                <div class="d-flex align-item-center">
                <h4 class="text-dark">Web Developer </h4> <h6 class="d-flex align-items-center"> (Remote / Part-time)</h6>
                </div>
                
              <h5>September 2022 - Actual</h5>
              <p><em>Carlos Soto Ph, Charlotte, NC</em></p>
              <ul>
                <li>Lead Web development, creating a new department in this company.</li>
                <li>Team work with the graphic designers and photograph.</li>
                <li>Implementing of Google Workspace for workflow to the team.</li>
                <li>With this department the company raise the profit to 30% the last 5 months.</li>
              </ul>
              </div>
            </div>

            <div class="pb-3">
              <h4 class="text-dark">Graphic/Web Designer</h4>
              <h5>April 2005 - April 2008</h5>
              <p><em>Alcaldía de San Diego, San Diego, Venezuela</em></p>
              <ul>
                <li>Design of digital and printed material with 95% of projects completed before their deadlines.</li>
                <li>Design website of institution, redesigning and updating all content, using Dreamweaver by Macromedia.</li>
                <li>As a Graphic Designer I Collaborated with the IT department Resolving Help Desk tasks Tier 1 and 2, managing over 300 users, reducing the number of callbacks by 40%.</li>
                <li>Used PowerPoint to create presentations for Journalists, Planning and Project, Treasury, and the city Mayor.</li>
              </ul>
            </div>

            <div class="pb-3">
              <h4 class="text-dark">Help Desk Support</h4>
              <h5>2017 - 2018</h5>
              <p><em>Oculaser, Valencia, Venezuela</em></p>
              <ul>
                <li>Graphic and Web Designer to Organization.</li>
                <li>eeping ~100 Users satisfied and Systems up providing Tier I and II support, Increased overall issue resolution rate by 10%.</li>
                <li>Visual Basic Junior Developer.</li>
              </ul>
            </div>



            

          </div>

        </div>

      </div>
    </div>


    <!-- skills -->
    <div class="untree_co-section pb-0" id="skills-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading gsap-reveal-hero mb-0"><strong>My Skills</strong></h2>
            <p class="gsap-reveal-hero">As a web developer, I possess a wide range of expertise that empowers me to create exceptional digital experiences. My key skills include:</p>
            <div class="wave gsap-reveal-hero" >
              <svg>
                <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
              </svg>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/html.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>HTML</u></h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/CSS.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>CSS</u></h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/javascript.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>JavaScript</u></h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/bootstrap.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>Bootstrap</u></h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/sass.png" alt="Image" class="img-fluid"></span>
              </div>
              <h6 class="gsap-reveal-hero">Sass</h6>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/reactjs.png" alt="Image" class="img-fluid"></span>
              </div>
              <h6 class="gsap-reveal-hero">React</h6>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/Wordpress.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>Wordpress</u></h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/php.png" alt="Image" class="img-fluid"></span>
              </div>
              <h6 class="gsap-reveal-hero">PHP</h6>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/mysql.png" alt="Image" class="img-fluid"></span>
              </div>
              <h6 class="gsap-reveal-hero">My SQL</h6>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/figma.png" alt="Image" class="img-fluid"></span>
              </div>
              <h6 class="gsap-reveal-hero">Figma</h6>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/photoshop.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>Adobe Photoshop</u></h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="service text-center">
              <div class="gsap-reveal-hero mb-3">
                <span class="icon-service"><img src="images/premier.png" alt="Image" class="img-fluid"></span>
              </div>
              <h3 class="gsap-reveal-hero"><u>Adobe Premiere Pro</u></h3>
            </div>
          </div>




        </div>
      </div>
    </div>

      <!-- Labs -->
    <div class="untree_co-section untree_co-section-4 pb-0 pt-5 "  id="portfolio-section">
    <div class="container">
      <div class="col-lg-7 text-center mx-auto">
        <h2 class="section-heading gsap-reveal-hero mb-0"><strong>Labs</strong></h2>
        <p class="gsap-reveal-hero">To enhance my knowledge and gain expertise in web development, I engage in a variety of personal practices. Here are a few of my preferred methods:</p>
        <div class="wave gsap-reveal-hero pb-3" >
          <svg>
            <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
          </svg>
        </div>
      </div> 

      <div class="relative"><div class="loader-portfolio-wrap"><div class="loader-portfolio"></div></div> </div>
      <div id="portfolio-single-holder"></div>

      <div class="portfolio-wrapper">

        <div id="posts" class="row">
          

        <?php while($element = mysqli_fetch_assoc($resultLabs)): ?>

            <div class="card m-5" style="width: 18rem;">

              <img src="images/<?php echo $element['image']; ?>" class="lazyload  card-img-top" alt="Images" />

              <div class="card-body">
                <h5 class="card-title"><?php echo ucfirst($element['name']); ?></h5>
                <p class="card-text"><?php echo $element['description']; ?></p>
              </div>

              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <img width="50px" <?php echo $element['tech1'] ? 'src=images/'.$element['tech1'] . '.png' : null ?>>
                  <img width="50px" <?php echo $element['tech2'] ? 'src=images/'.$element['tech2'] . '.png' : null ?>>
                  <img width="50px" <?php echo $element['tech3'] ? 'src=images/'.$element['tech3'] . '.png' : null ?>>
                </li>
              </ul>

              <div class="card-body">
                <a href="<?php echo $element['link']; ?>" class="card-link fs-1">Link</a>
                <a href="<?php echo $element['link']; ?>" class="card-link">GitHub</a>
              </div>

            </div>
                    
        <?php endwhile; ?>



        </div>
      </div>


        <!-- </div>
        </div> -->
      </div>
    </div>

    <!-- contact -->
    <div class="untree_co-section" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading gsap-reveal-hero mb-0"><strong>Contact</strong></h2>
            <p class="gsap-reveal-hero">Available for work. Get in touch</p>

            <div class="wave gsap-reveal-hero" >
              <svg>
                <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
              </svg>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <form action="#">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input type="text" class="form-control" placeholder="Firstname">
                </div>
                <div class="col-lg-6 form-group">
                  <input type="text" class="form-control" placeholder="Lastname">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 form-group">
                  <input type="email" class="form-control" placeholder="Email address">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Write your message..."></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12 form-group">
                  <input type="submit" class="btn btn-black" value="Send Message">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105542.3992934437!2d-84.57849123057707!3d34.24344048750989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f508baa865578b%3A0x64c2cac210ae9806!2sCanton%2C%20GA!5e0!3m2!1sen!2sus!4v1684681344038!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php 
 
mysqli_close($db);

incluirTemplate('footer'); ?>
