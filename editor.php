<?php if( function_exists('have_rows') ) : ?>

  <?php if ( have_rows( 'flexible_content_editor' ) ) : $section_ctr = 0; ?>
    <?php while ( have_rows( 'flexible_content_editor' ) ) : the_row(); $section_ctr++; ?>
      <?php 
        /*!
        * Text Block
        */
        if ( get_row_layout() == 'standard_block' ) :
          $section_id = get_row_layout() . $section_ctr;
            $section = get_sub_field( 'section' );
            $container = get_sub_field( 'container' );
            $columns = get_sub_field( 'columns' );
      ?>
          <style>
            /* Style */
            <?= '#' . $section_id; ?> {
              background-color: <?= $section['background_color']; ?>;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              margin-top: <?= $section['margin']['top']; ?>px;
              margin-bottom: <?= $section['margin']['bottom']; ?>px;
              padding-top: <?= $section['padding']['top']; ?>px;
              padding-bottom: <?= $section['padding']['bottom']; ?>px;
            }
            <?= '#' . $section_id . '>.' . $container['layout']; ?> {
              background-color: <?= $container['background_color']; ?>;
              min-height: <?= $container['height']; ?>;
              margin-top: <?= $container['margin']['top']; ?>px;
              margin-bottom: <?= $container['margin']['bottom']; ?>px;
            }
            <?= '#' . $section_id; ?> img {
              max-width: 100%;
            }
            @media (min-width: 576px) {
              <?= '#' . $section_id . '>.custom-container'; ?> { width: 540px; }
            }
            @media (min-width: 768px) {
              <?= '#' . $section_id . '>.custom-container'; ?> { width: <?= $container['width'] - 420; ?>px; }
            }
            @media (min-width: 992px) {
              <?= '#' . $section_id . '>.custom-container'; ?> { width: <?= $container['width'] - 180; ?>px; }
            }
            @media (min-width: 1200px) {
              <?= '#' . $section_id . '>.custom-container'; ?> { width: <?= $container['width']; ?>px; }
            }
          </style>
          <!-- HTML -->
          <section id="<?= $section_id; ?>" class="section <?= $section['class']; ?>" style="background-image: url(<?= $section['background_image']; ?>);">
            <div class="<?= $container['layout']; ?> d-flex flex-column justify-content-center">
              <div class="row">
                <?php if ( get_sub_field( 'section_header' ) ) : ?>
                  <div class="col-md-8 offset-md-2 mb-2">
                    <?php the_sub_field( 'section_header' ); ?>
                  </div>
                <?php endif; ?>

                <?php if ( $columns == 'one-column' ) : ?>
                  <div class="col-md-12">
                    <?php the_sub_field( 'column01' ); ?>
                  </div>
                <?php elseif ( $columns == 'two-columns' ) : ?>
                  <div class="col-md-6 mb-2">
                    <?php the_sub_field( 'column01' ); ?>
                  </div>
                  <div class="col-md-6">
                    <?php the_sub_field( 'column02' ); ?>
                  </div>
                <?php elseif ( $columns == 'three-columns' ) : ?>
                  <div class="col-lg-4 mb-2">
                    <?php the_sub_field( 'column01' ); ?>
                  </div>
                  <div class="col-lg-4 mb-2">
                    <?php the_sub_field( 'column02' ); ?>
                  </div>
                  <div class="col-lg-4">
                    <?php the_sub_field( 'column03' ); ?>
                  </div>
                <?php elseif ( $columns == 'four-columns' ) : ?>
                  <div class="col-xl-3 col-lg-6 mb-2">
                    <?php the_sub_field( 'column01' ); ?>
                  </div>
                  <div class="col-xl-3 col-lg-6 mb-2">
                    <?php the_sub_field( 'column02' ); ?>
                  </div>
                  <div class="col-xl-3 col-lg-6 mb-2">
                    <?php the_sub_field( 'column03' ); ?>
                  </div>
                  <div class="col-xl-3 col-lg-6">
                    <?php the_sub_field( 'column04' ); ?>
                  </div>
                <?php endif; ?>

                <?php if ( get_sub_field( 'section_footer' ) ) : ?>
                  <div class="col-md-8 offset-md-2">
                    <?php the_sub_field( 'section_footer' ); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </section>
      <?php 
        /*!
        * Recent Posts
        */
        elseif ( get_row_layout() == 'recent_posts_block' ) : ?>
          <section>
            <div class="container">
              <?php
                $query = new WP_Query([
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'post_status' => 'publish'
                ]);
              ?>
              <?php if ( $query->have_posts() ) : ?>
                <div class="slick-recent-posts">
                  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="card-post">
                      <div class="card-post__image">
                        <?php echo get_the_post_thumbnail( get_the_ID(), 'medium') ?>
                      </div>
                      <div class="card-post__body">
                        <h4 class="card-post__title"><?php the_title() ?></h4>
                        <p class="card-post__excerpt"><?php echo get_the_excerpt() ?></p>
                        <div class="card-post__learnmore">
                          <a href="<?php the_permalink() ?>">Learn more... ></a>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; wp_reset_postdata(); ?>
                </div>
              <?php endif; ?>
            </div>
          </section>
      <?php
        else: 
      ?>
          Layout not found.
      <?php
        endif; 
      ?>
    <?php endwhile; ?>
  <?php endif; ?>

<?php else: ?>
  
  <div class="container" style="color: #f00; padding-top: 30px; padding-bottom: 30px">
    <code>[ACF not found : editor.php]</code>
  </div>

<?php endif; ?>