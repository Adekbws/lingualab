<div class="container-fluid subHeader">
    <div class="row subHeaderTop" <?php if($header_image = get_field( "header_image" )){ echo 'style="background-image:url(' .$header_image. ')"';} ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 subHeaderContent">
                    <?php
                        $header_text = get_field( "header_text" );
                        if($header_text)
                        {
                            echo '<span class="subHeaderTitle">'.$header_text.'</span>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row subHeaderBottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                $breadcrumbs_code = get_field( "breadcrumbs_code" );
                if($breadcrumbs_code)
                {
                    echo $breadcrumbs_code;
                }
                else
                {
                  if(function_exists('bcn_display'))
                  {
                      bcn_display();
                  }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
