<?php
/**
 * Template Name: single-photographie
 * Template Post Type: projet
 
 */

 get_header();
 ?>

<section class="single-projet">
 
 <?php   if  (have_posts()) : 
          while ( have_posts() ) :
             the_post();  
             
    // *****Récupération des valeurs de champ ACF ***  
    // Récupérer l'ID du custom post type 
    $projet_id = get_the_ID(); 
     //  Récupérer les valeurs des champs  
    $objectif = get_post_meta($post->ID, 'objectif', true); 
    $realisation = get_post_meta($post->ID, 'realisation', true); 
    $contrainte = get_post_meta($post->ID, 'contraintes_techniques', true);  
    $technologie =  get_post_meta(get_the_ID(), '$technologies', true);
       
        // Récupérer le titre du custom post type
    $post_title = get_the_title();


            echo '<h2 class="projet-title">' . $post_title . '</h2>';
 ?>
    
    
    <aside class="projet-photo">
        <!-- Afficher le texte alternatif de la photographie -->
			<?php $photo_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);  ?>
            <img src="<?php the_post_thumbnail_url();  ?>" alt="<?php echo $photo_alt; ?>">
    </aside>
    <article>
<?php        
    echo    '<h4 class="objectif">' . $objectif . '</h4>';
    echo    '<p class="realisation">' . $realisation. '</p>';
    echo    '<p class="contrainte">' . $contrainte. '</p>';    
				
	if($technologie == 'Wordpress'){
        echo '';
    };				
				
?>    
    </article>
</section>      
  <?php
       endwhile; // End of the loop. 
     endif;   
     
 //  get_sidebar();
  get_footer();
  ?>