<div class="container-fluid subHeader subHeaderBlog">
    <div class="row subHeaderTop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 subHeaderContent">
                  &nbsp;
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
