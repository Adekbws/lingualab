<fieldset>
                            <legend>Szczegóły - Tłumaczenia przysięgłe</legend>
                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="">Z języka:</label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                              <?php
                                              $languages = str_replace(' ', '', get_field('translate_from',103));
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
                                            <label class="col-md-4 label" for="">Na język:</label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                              <?php
                                              $languages = str_replace(' ', '', get_field('translate_to',103));
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
                                            <label class="col-md-4 label" for="">tłumaczenie<br>z oryginału / kopii</label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                                <option value="TAK, dostarczę oryginał dokumentu ">TAK, dostarczę oryginał dokumentu </option>
                                                <option value="NIE, nie dostarczę oryginału dokumentu">NIE, nie dostarczę oryginału dokumentu</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="deadline">Termin realizacji:</label>
                                            <div class="col-md-8 input">
                                                <input id="deadline" class="dateInput" type="text" name="deadline" autocomplete="off" placeholder="dd , mm , rrrr">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                             <div class="row efFieldRow twoInputRow">
                             <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="">Sposób dostawy:</label>
                                            <div class="col-md-8 input">
                                            <select name="service_type">
                                                <?php
                                                $ship = get_field('ship_options',103);
                                                $pieces = explode(";",$ship);
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
                                        <div class="col-md-4 label filelabel" for="client_q">
                                            <span>Dodaj jeden dokument<br>lub folder ZIP z wieloma plikami.</span>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/info-icon.png" alt="" title="W przypadku większej ilości plików prosimy o spakowanie ich do formatu .zip lub .rar. <br><br> Jeśli załącznik przekracza 30 MB, prosimy o kontakt na adres info@lingualab.pl" class="infoToolTip" >
                                        </div>
                                        <div class="col-md-8 input fileInputWrapper">

                                            <input id="attachment" class="fileInput" type="file" name="file" autocomplete="off">
                                            <label for="attachment">
                                                <span class="fileButton">Przeglądaj...</span>
                                                <span class="fileName" id="attachment_fileName" data-label="Nie wybrano pliku">Nie wybrano pliku</span>
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
                                            <label class="col-md-4 label" for="optional_comment">Dodatkowy komentarz</label>
                                            <div class="col-md-8 input">
                                                <input id="optional_comment" class="" type="text" name="optional_comment" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
