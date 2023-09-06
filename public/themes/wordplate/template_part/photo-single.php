<?php  
$reference = get_post_meta(get_the_ID(), 'reference', true);
$annee = get_post_meta(get_the_ID(), 'annee', true);
$format = get_post_meta(get_the_ID(), 'format', true);
$type = get_post_meta(get_the_ID(), 'type', true);
$fichier = get_post_meta(get_the_ID(), 'fichier', true);
$fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);      ?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('/inc/images/style-joiner.css'); ?>">
    <script src="/inc/images/js.js" defer=""></script>
</head>
<html>

<div id="app">
<div class="index">
<div class="footer-desktop footer-desktop-instance">
    <div class="group">
        
    </div><img class="line" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df017d18733b734262d811/img/line-2.svg">
</div>
<div class="frame">
            <div class=" ">TEAM MARIÉE</div>
            <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
            <div class="text-wrapper">CATÉGORIE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
            <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
        </div>
<div class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</div>
<p class="div">Cette photo vous intéresse ?</p><img class="img" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df43628ee8453fffe9bfb1/img/line-3.svg">
<img class="line-2" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df43628ee8453fffe9bfb1/img/line-4.svg"><?php echo '<img src="' . $fichier . '" class="nathalie-jpeg">'; ?>
<div class="CTA CTA-instance">
    <div class="charger-plus CTA-2">Contact</div>
</div>
<div class="CTA CTA-3">
    <div class="charger-plus CTA-2">Toutes les photos</div>
</div>
<div class="card-photo"></div>
<div class="card-photo-2"></div>
</div>
</div>