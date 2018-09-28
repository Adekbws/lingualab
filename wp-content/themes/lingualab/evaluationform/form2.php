<fieldset>
                            <legend><?php _e( 'Szczegóły - Tłumaczenia przysięgłe', 'lingualab' );?></legend>
                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="from_language"><?php _e( 'Z języka:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="evaluation_form[from_language]" id="from_language">
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
                                            <label class="col-md-4 label" for="to_language"><?php _e( 'Na język', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="evaluation_form[to_language]" id="to_language">
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
                                            <label class="col-md-4 label" for="translate_for"><?php _e( 'tłumaczenia', 'lingualab' );?><br><?php _e( 'z oryginału / kopii', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="evaluation_form[translate_for]" id="translate_for">
                                                <option value="<?php _e( 'TAK, dostarczę oryginał dokumentu', 'lingualab' );?>"><?php _e( 'TAK, dostarczę oryginał dokumentu', 'lingualab' );?></option>
                                                <option value="<?php _e( 'NIE, nie dostarczę oryginału dokumentu', 'lingualab' );?>"><?php _e( 'NIE, nie dostarczę oryginału dokumentu', 'lingualab' );?></option>
                                            </select>
                                            <div class="mobile-selects"><div><?php _e( 'TAK, dostarczę oryginał dokumentu', 'lingualab' );?></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="deadline"><?php _e( 'Termin realizacji:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="deadline" class="dateInput" type="text" name="evaluation_form[deadline]" autocomplete="off" placeholder="dd , mm , rrrr">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                             <div class="row efFieldRow twoInputRow">
                             <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="delivery_method"><?php _e( 'Sposób dostawy:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="evaluation_form[delivery_method]" id="delivery_method">
                                                <?php
                                                $ship = get_field('ship_options',103);
                                                $pieces = explode(";",$ship);
                                                foreach ($pieces as $key => $value) {
                                                  echo '<option value="'.$value.'">'.$value.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="mobile-selects"><div><?php echo $pieces[0]; ?></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <div class="col-md-4 label filelabel">
                                            <span><?php _e( 'Dodaj jeden dokument', 'lingualab' );?><br><?php _e( 'lub folder ZIP z wieloma plikami.', 'lingualab' );?></span>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.png" alt="" title="<?php _e( 'W przypadku większej ilości plików prosimy o spakowanie ich do formatu .zip lub .rar.', 'lingualab' );?> <br><br> <?php _e( 'Jeśli załącznik przekracza 30 MB, prosimy o kontakt na adres info@lingualab.pl', 'lingualab' );?>" class="infoToolTip" >
                                        </div>
                                        <div class="col-md-8 input fileInputWrapper">

                                            <input id="attachment" class="fileInput" type="file" name="evaluation_form[file]" autocomplete="off">
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
                                                <input id="optional_comment" class="" type="text" name="evaluation_form[optional_comment]" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
