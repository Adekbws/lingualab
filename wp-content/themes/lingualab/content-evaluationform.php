<div class="container-fluid evaluationFormArea">
    <div class="container size1">
        <div class="row">
            <div class="col-md-12">
                <span class="titleSection"><?php _e( 'Bezpłatna wycena', 'lingualab' );?></span>
            </div>
            <div class="col-md-12 contentTextBlock">
            <?php if($evaluationform_text=get_field('evaluationform_text',pll_get_post(103)))
                {
                  echo $evaluationform_text;
                }
            ?>
            </div>
        </div>
    </div>
    <div class="container formcontainer">
        <div class="row submit-row">
            <div class="col-md-12">
                <form method="post" id="evaluationForm">
                    <fieldset>
                        <legend><?php _e( 'Dane osobowe', 'lingualab' );?></legend>
                        <div class="row efFieldRow threeColumn">
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_name"><?php _e( 'Imię:', 'lingualab' );?></label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_name" class="" type="text" name="client_name" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_surname"><?php _e( 'Nazwisko:', 'lingualab' );?></label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_surname" class="" type="text" name="client_surname" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_email"><?php _e( 'E-mail:', 'lingualab' );?></label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_email" class="" type="email" name="client_email" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                         <div class="row efFieldRow threeColumn">
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_phone"><?php _e( 'Telefon kontaktowy:', 'lingualab' );?></label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_phone" class="" type="text" name="client_phone" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_company"><?php _e( 'Nazwa firmy:', 'lingualab' );?></label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_company" class="" type="text" name="client_company" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_q"><?php _e( 'Jaką frazę wspisałeś w wyszukiwarce, aby nas znaleźć?', 'lingualab' );?></label>
                                        <div class="col-md-8 input">
                                            <input id="client_q" class="" type="text" name="client_q" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </fieldset>
                    <fieldset class="option-fieldset">
                        <legend><?php _e( 'Usługa:', 'lingualab' );?></legend>

                        <div class="row efFieldRow oneInputRow">
                            <div class="col-md-12 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="evaluationFormService"><?php _e( 'Wybierz usługę:', 'lingualab' );?></label>
                                        <div class="col-md-8 input">
                                        <select name="service_type" id="evaluationFormService">
                                            <option value="0">–––</option>
                                            <option value="1"><?php _e( 'Tłumaczenia pisemne specjalistyczne', 'lingualab' );?></option>
                                            <option value="2"><?php _e( 'Tłumaczenie przysięgłe', 'lingualab' );?></option>
                                            <option value="3"><?php _e( 'Tłumaczenie pisemne specjalistyczne lub/i przysięgłe', 'lingualab' );?></option>
                                            <option value="4"><?php _e( 'Tłumaczenie pisemne specjalistyczne wraz ze składem (DTP)', 'lingualab' );?></option>
                                            <option value="5"><?php _e( 'Skład do druku (DTP)', 'lingualab' );?></option>
                                            <option value="1"><?php _e( 'Korekta Native Speakera', 'lingualab' );?></option>
                                            <option value="7"><?php _e( 'Lokalizacja', 'lingualab' );?></option>
                                            <option value="8"><?php _e( 'Tłumaczenie ustne', 'lingualab' );?></option>
                                            <option value="9"><?php _e( 'Sprzęt do tłumaczeń symultanicznych', 'lingualab' );?></option>
                                            <option value="10"><?php _e( 'Tłumaczenie ustne wraz ze sprzętem', 'lingualab' );?></option>

                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div id="evaluationFormContent">
                        &nbsp;
                    </div>
                    <div class="row evaluationFormSemdWrapper">
                        <div class="col-md-12 rodoCheckWrapper">
                            <input type="checkbox" name="rodo" id="rodoCheck" required>
                            <label for ="rodoCheck" class="rodoCheckLabel">
                              <?php
                              if($evaluationform_rodo=get_field('evaluationform_rodo',pll_get_post(103)))
                              echo $evaluationform_rodo;
                              ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit"><?php _e( 'wyślij', 'lingualab' );?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
