<fieldset>
                            <legend>Szczegóły - Skład do druku (DTP)</legend>
                            <div class="row efFieldRow oneInputRow">
                            <div class="col-md-12 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="evaluationFormService">Przeznaczenie<br>dokumentu</label>
                                        <div class="col-md-8 input">
                                        <select name="service_type" id="evaluationFormService">
                                            <option value="do profesjonalnego wydruku">do profesjonalnego wydruku</option>
                                            <option value="do komunikacji elektronicznej"> do komunikacji elektronicznej</option>
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
                                            <label class="col-md-4 label" for="deadline">Termin realizacji:</label>
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
