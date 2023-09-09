
<?php  
get_template_part('contact-modale');
$reference = get_post_meta(get_the_ID(), 'reference', true);
$annee = get_post_meta(get_the_ID(), 'annee', true);
$format = get_post_meta(get_the_ID(), 'format', true);
$type = get_post_meta(get_the_ID(), 'type', true);
$fichier = get_post_meta(get_the_ID(), 'fichier', true);
$fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);      ?>
<!DOCTYPE html>

<head>
    <script src="<?php echo esc_url(get_theme_file_uri('/inc/costum.js')); ?>" defer></script>

</head>
<html>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/inc/style.css'); ?>">

   <body>
<div class="logoo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img class="logoo" src="<?php echo esc_url(get_theme_mod('logo_setting')); ?>" alt="<?php bloginfo('name'); ?> Logo">
    </a>
</div>




<nav class="menu-container">
    <?php
 
    $menu_args = array(
        'theme_location' => 'navigation',
        'container'      => 'ul',
        'menu_class'     => 'menu-container',
        /*'walker'         => new Custom_Walker_Nav_Menu()*/
    );
    wp_nav_menu($menu_args);
    ?>
</nav>


<div id="app">
<div class="index">
<div class="footer-desktop ">
    <div class="group">
        
    </div><img class="line" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df017d18733b734262d811/img/line-2.svg">
</div>
<div class="frame">
            <div class=" team-mari-e">TEAM MARIÉE</div>
            <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
            <div class="text-wrapper">CATÉGORIE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
            <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
        </div>
<div class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</div>

<p class="div">Cette photo vous intéresse ?</p> <img class="line-2" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df43628ee8453fffe9bfb1/img/line-4.svg">
<div class="galler galler-item ">
<?php echo do_shortcode('[gallery ids="41778,41777"]');?>
<button  class="prev galler-icon " onclick="scrollGallery(-1)"></button>
<button    class="next galler-icon" onclick="scrollGallery(1)"></button>


<?php echo '<img src="' . $fichier . '" class="nathalie-jpeg">'; ?>
</div>

<div class="CTA CTA-instance " >
    
    <div class="charger-plus " id="
    ">Contact</div>
    
</div>

<div class="CTA CTA-3">



    <div class="charger-plus CTA-2">Toutes les photos</div>

</div>
<div class="card-photo"></div>
<div class="card-photo-2"></div>
</div>
</div>
<?php get_footer();?>

  

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " data-text="TACTCONTACT" id="myModalLabel"> </h5>
      </div>
      <div class="modal-body " >
      <form action="/themes/worpalte/template_part/traitement_formulaire.php" method="post">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
          </div>
          <div class="form-group">
            <label for="email"> E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse e-mail">
          </div>
          <div class="form-group">
            <label for="text"> Réf photo</label>
            <input type="hidden" id="generated_ref" name="generated_ref">
            <input type="text" class="form-control" id="email" name="email" placeholder="Réf">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
  </div>
</div>
