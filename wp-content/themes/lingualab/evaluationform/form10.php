<fieldset>
                            <legend><?php _e( 'Szczegóły - tłumaczenia ustne wraz ze sprzętem', 'lingualab' );?></legend>
                            <div class="row efFieldRow oneInputRow">
                                <div class="col-md-12 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="evaluationFormService"><?php _e( 'Rodzaj tłumaczenia:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                            <select name="service_type" id="evaluationFormService">
                                                <option value="">konsekutywne</option>
                                                <option value="">symultaniczne </option>
                                                <option value="">oba rodzaje</option>
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
                                            <label class="col-md-4 label" for="client_company"><?php _e( 'Miasto / miejsce:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="client_company" class="" type="text" name="client_company" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company"><?php _e( 'Tematyka tłumaczenia:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="client_company" class="" type="text" name="client_company" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="daysList" data-nextday="2">
                                <div class="row efFieldRow dayRow">
                                    <div class="col-md-4 efField dayDate">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                                 <label class="col-md-4 label" for="optional_comment"><?php _e( 'Pierwszy dzień:', 'lingualab' );?> <span><?php _e( 'Data:', 'lingualab' );?></span></label>
                                                <div class="col-md-8 input">
                                                    <input id="deadline" class="dateInput" type="text" name="daylist[1][deadline]" autocomplete="off" placeholder="dd , mm , rrrr">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 efField dayTime">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                                <label class="col-md-4 label" for=""><?php _e( 'Od:', 'lingualab' );?></label>
                                                <div class="col-md-8 input">
                                                <select name="daylist[1][from]" id="evaluationFormService">
                                                  <?php
                                                  $time_start = get_field('earliest_hour',pll_get_post(103));
                                                  $time_end = get_field('latest_hour',pll_get_post(103));
                                                  $timePosition = '00:15';

                                                  while($timePosition!='00:00')
                                                  {
                                                    if (strtotime($timePosition)>=strtotime($time_start) && strtotime($timePosition)<=strtotime($time_end)) {
                                                        echo '<option value="' .$timePosition. '">' .$timePosition. '</option>';
                                                    }
                                                      $timePosition = date('H:i',strtotime("+15 minutes", strtotime($timePosition)));

                                                  }


                                                  ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 efField dayTime">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                                <label class="col-md-4 label" for=""><?php _e( 'Do:', 'lingualab' );?></label>
                                                <div class="col-md-8 input">
                                                <select name="daylist[1][to]" id="evaluationFormService">
                                                  <?php
                                                  $time_start = get_field('earliest_hour',pll_get_post(103));
                                                  $time_end = get_field('latest_hour',pll_get_post(103));
                                                  $timePosition = '00:15';

                                                  while($timePosition!='00:00')
                                                  {
                                                    if (strtotime($timePosition)>=strtotime($time_start) && strtotime($timePosition)<=strtotime($time_end)) {
                                                        echo '<option value="' .$timePosition. '">' .$timePosition. '</option>';
                                                    }
                                                      $timePosition = date('H:i',strtotime("+15 minutes", strtotime($timePosition)));

                                                  }


                                                  ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 efField addDay" data-id="1">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                              <span class="col-md-5 addNextDayLabel"><?php _e( 'Kolejny', 'lingualab' );?><br><?php _e( 'dzień:', 'lingualab' );?></span>
                                               <button class="col-md-7 addNextDay" data-id="1"><?php _e( 'Dodaj', 'lingualab' );?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company"><?php _e( 'Dla ilu osób zapewnić odbiorniki przekazu::', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="client_company" class="" type="text" name="client_company" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company"><?php _e( 'Nagłośnienie:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                              <select name="service_type">
                                                  <option value="<?php _e( 'TAK, należy zapewnić', 'lingualab' );?>"><?php _e( 'TAK, należy zapewnić', 'lingualab' );?></option>
                                                  <option value="<?php _e( 'Nagłośnienie', 'lingualab' );?>"><?php _e( 'Nagłośnienie', 'lingualab' );?></option>
                                                  <option value="<?php _e( 'Nie wiem', 'lingualab' );?>"><?php _e( 'Nie wiem', 'lingualab' );?></option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row efFieldRow oneInputRow">
                                <div class="col-md-12 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="optional_comment"><?php _e( 'Ilość mikrofonów i ich rodzaj', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="optional_comment" class="" type="text" name="optional_comment" autocomplete="off">
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
