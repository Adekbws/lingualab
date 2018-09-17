<div class="container-fluid evaluationFormArea">
    <div class="container size1">
        <div class="row">
            <div class="col-md-12">
                <span class="titleSection"><?php _e( 'Bezpłatna wycena', 'lingualab' );?></span>
            </div>
            <div class="col-md-12 contentTextBlock">
            <?php if($evaluationform_text=get_field('evaluationform_text',103))
                {
                  echo $evaluationform_text;
                }
            ?>
            </div>
        </div>
    </div>
    <div class="container formcontainer">
        <div class="row">
            <div class="col-md-12">
                <form method="post" id="evaluationForm">
                    <fieldset>
                        <legend>Dane osobowe</legend>
                        <div class="row efFieldRow threeColumn">
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_name">Imię:</label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_name" class="" type="text" name="client_name" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_surname">Nazwisko:</label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_surname" class="" type="text" name="client_surname" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_email">E-mail:</label>
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
                                        <label class="col-md-4 label" for="client_phone">Telefon kontaktowy:</label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_phone" class="" type="text" name="client_phone" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_company">Nazwa firmy:</label>
                                        <div class="col-md-8 input requiredField">
                                            <input id="client_company" class="" type="text" name="client_company" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="client_q">Jaką frazę wspisałeś w wyszukiwarce, aby nas znaleźć?</label>
                                        <div class="col-md-8 input">
                                            <input id="client_q" class="" type="text" name="client_q" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </fieldset>
                    <fieldset class="option-fieldset">
                        <legend>Usługa</legend>

                        <div class="row efFieldRow oneInputRow">
                            <div class="col-md-12 efField">
                                <div class="efFieldContent">
                                    <div class="row efFieldContentRow">
                                        <label class="col-md-4 label" for="evaluationFormService">Wybierz usługę:</label>
                                        <div class="col-md-8 input">
                                        <select name="service_type" id="evaluationFormService">
                                            <option value="1">–––</option>
                                            <option value="1">Tłumaczenia pisemne specjalistyczne</option>
                                            <option value="2">Tłumaczenie przysięgłe</option>
                                            <option value="3">Tłumaczenie pisemne specjalistyczne lub/i przysięgłe</option>
                                            <option value="4">Tłumaczenie pisemne specjalistyczne wraz ze składem (DTP)</option>
                                            <option value="5">Skład do druku (DTP)</option>
                                            <option value="1">Korekta Native Speakera</option>
                                            <option value="7">Lokalizacja</option>
                                            <option value="8">Tłumaczenie ustne</option>
                                            <option value="9">Sprzęt do tłumaczeń symultanicznych</option>
                                            <option value="10">Tłumaczenie ustne wraz ze sprzętem</option>

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
                            <label for ="rodoCheck" class="rodoCheckLabel">Zgadzam się na przetwarzanie danych.</label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit">wyślij</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
