<fieldset>
                            <legend><?php _e( 'Szczegóły - Tłumaczenia specjalistyczne lub/i przysięgłe', 'lingualab' );?></legend>
                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for=""><?php _e( 'Z języka:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                              <?php
                                              $languages = str_replace(' ', '', get_field('translate_from',pll_get_post(103)));
                                              $pieces = explode(";",$languages);
                                              foreach ($pieces as $key => $value) {
                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                              }
                                              ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for=""><?php _e( 'Na język', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                              <?php
                                              $languages = str_replace(' ', '', get_field('translate_to',pll_get_post(103)));
                                              $pieces = explode(";",$languages);
                                              foreach ($pieces as $key => $value) {
                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                              }
                                              ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="deadline"><?php _e( 'Termin realizacji:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="deadline" class="dateInput" type="text" name="deadline" autocomplete="off" placeholder="dd , mm , rrrr">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <div class="col-md-4 label filelabel" for="client_q">
                                            <span><?php _e( 'Dodaj jeden dokument', 'lingualab' );?><br><?php _e( 'lub folder ZIP z wieloma plikami.', 'lingualab' );?></span>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.png" alt="" title="<?php _e( 'W przypadku większej ilości plików prosimy o spakowanie ich do formatu .zip lub .rar.', 'lingualab' );?> <br><br> <?php _e( 'Jeśli załącznik przekracza 30 MB, prosimy o kontakt na adres info@lingualab.pl', 'lingualab' );?>" class="infoToolTip" >
                                        </div>
                                        <div class="col-md-8 input fileInputWrapper">

                                            <input id="attachment" class="fileInput" type="file" name="file" autocomplete="off">
                                            <label for="attachment">
                                                <span class="fileButton"><?php _e( 'Przeglądaj...', 'lingualab' );?></span>
                                                <span class="fileName" id="attachment_fileName" data-label="Nie wybrano pliku"><?php _e( 'Nie wybrano pliku', 'lingualab' );?></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row efFieldRow oneInputRow">
                                <div class="col-md-12 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="optional_comment"><?php _e( 'Dodatkowy komentarz', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="optional_comment" class="" type="text" name="optional_comment" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
     </fieldset>
