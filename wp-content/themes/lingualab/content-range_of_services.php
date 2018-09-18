<?php
$taxonomy = 'uslugi_category';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
if ( $terms && !is_wp_error( $terms ) ) :

?>
<div class="container-fluid rangeOfServicesPageWrapper">
   <div class="container branches-container">
     <div class="row sub-title">
         <div class="col-md-12">
           <span>Zakres usług</span>
         </div>
     </div>


         <?php foreach ( $terms as $key => $term ) { ?>
           <div class="col-md-3 col-sm-4 ">
             <a href="<?php echo get_permalink(get_field('link_uslugi',$term)->ID) ?>">
               <div class="branch">
                       <div>

                           <div>
                               <?php if (get_field('zdj_uslug',$term)) { ?>
                                 <img src="<?php echo get_field('zdj_uslug',$term); ?>" style="visibility: hidden;" />
                               <?php } ?>
                               <div class="ico-title-box">
                                 <div class="branch-ico" style="background-image:url(<?php echo get_field('zdj_uslug',$term);?>);">

                                 </div>
                                 <div>
                                   <span class="branch-title"><?php echo $term->name; ?></span>
                                 </div>
                               </div>

                           </div>
                       </div>
               </div>
             </a>
           </div>
        <?php } ?>

   </div>
</div>
<?php endif;
