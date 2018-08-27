<div class="container-fluid infoArea">
    <div class="container size1">
        <div class="row">
            <div class="col-md-6 contactInfoWrapp">
                <?php if ( is_active_sidebar( 'contact-info' ) ) : ?>
                <?php dynamic_sidebar( 'contact-info' ); ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 blogInfoWrapp">
                <span class="blogInfoTitle"><?php _e('Odwiedź nasz blog', 'lingualab') ?></span> 
                <div class="latestPosts">
                        <a href="#" class="lastPost">
                            <span class="lastPostTitle">Tytuł najnowszego wpisu z bloga firmowego</span>
                            <div class="lastPostContent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust...
                            </div>
                        </a>
                        <a href="#" class="lastPost">
                            <span class="lastPostTitle">Tytuł kolejnego wpisu z bloga firmowego</span>
                            <div class="lastPostContent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust...
                            </div>
                        </a>
                </div>

            </div>
        </div>
    </div>
</div>
