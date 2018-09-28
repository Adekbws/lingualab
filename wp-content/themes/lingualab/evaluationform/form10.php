<fieldset>
                            <legend><?php _e( 'Szczegóły - tłumaczenia ustne wraz ze sprzętem', 'lingualab' );?></legend>
                            <div class="row efFieldRow oneInputRow">
                              <div class="col-md-12 efField">
                                  <div class="efFieldContent">
                                      <div class="row efFieldContentRow">
                                          <label class="col-md-4 label" for="translate_type"><?php _e( 'Rodzaj tłumaczenia:', 'lingualab' );?></label>
                                          <div class="col-md-8 input">
                                          <select name="evaluation_form[translate_type]" id="translate_type">
                                              <?php
                                              $translation = get_field('translation_type',pll_get_post(103));
                                              $pieces = explode(";",$translation);
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
                            </div>
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
                                            <label class="col-md-4 label" for="to_language"><?php _e( 'Na język:', 'lingualab' );?></label>
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
                                            <label class="col-md-4 label" for="place"><?php _e( 'Miasto / miejsce:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="place" class="" type="text" name="evaluation_form[place]" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="translate_topic"><?php _e( 'Tematyka tłumaczenia:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="translate_topic" class="" type="text" name="evaluation_form[translate_topic]" autocomplete="off">
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
                                                 <label class="col-md-4 label"><?php _e( 'Pierwszy dzień:', 'lingualab' );?> <span><?php _e( 'Data:', 'lingualab' );?></span></label>
                                                <div class="col-md-8 input">
                                                    <input id="deadline" class="dateInput" type="text" name="evaluation_form[daylist][0][deadline]" autocomplete="off" placeholder="dd , mm , rrrr">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 efField dayTime">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                                <label class="col-md-4 label" for=""><?php _e( 'Od:', 'lingualab' );?></label>
                                                <div class="col-md-8 input">
                                                <select name="evaluation_form[daylist][0][from]">
                                                  <?php
                                                  $time_startFrom = get_field('earliest_hour',pll_get_post(103));
                                                  $time_endFrom = get_field('latest_hour',pll_get_post(103));
                                                  $timePosition = '00:15';

                                                  while($timePosition!='00:00')
                                                  {
                                                    if (strtotime($timePosition)>=strtotime($time_startFrom) && strtotime($timePosition)<=strtotime($time_endFrom)) {
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
                                                <select name="evaluation_form[daylist][0][to]">
                                                  <?php
                                                  $time_startTo = get_field('earliest_hour',pll_get_post(103));
                                                  $time_endTo = get_field('latest_hour',pll_get_post(103));
                                                  $timePosition = '00:15';

                                                  while($timePosition!='00:00')
                                                  {
                                                    if (strtotime($timePosition)>=strtotime($time_startTo) && strtotime($timePosition)<=strtotime($time_endTo)) {
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
                                              <button class="col-md-7 addNextDay" data-id="1" data-fromstart="<?php echo $time_startFrom; ?>" data-fromstop="<?php echo $time_endFrom; ?>" data-tostart="<?php echo $time_startTo; ?>" data-tostop="<?php echo $time_endTo; ?>"><?php _e( 'Dodaj', 'lingualab' );?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="transmitters"><?php _e( 'Dla ilu osób zapewnić odbiorniki przekazu:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="transmitters" class="" type="text" name="evaluation_form[transmitters]" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="sound"><?php _e( 'Nagłośnienie:', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                              <select name="evaluation_form[sound]" id="sound">
                                                  <option value="<?php _e( 'TAK, należy zapewnić', 'lingualab' );?>"><?php _e( 'TAK, należy zapewnić', 'lingualab' );?></option>
                                                  <option value="<?php _e( 'Nagłośnienie', 'lingualab' );?>"><?php _e( 'Nagłośnienie', 'lingualab' );?></option>
                                                  <option value="<?php _e( 'Nie wiem', 'lingualab' );?>"><?php _e( 'Nie wiem', 'lingualab' );?></option>
                                              </select>
                                              <div class="mobile-selects"><div><?php _e( 'TAK, należy zapewnić', 'lingualab' );?></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row efFieldRow oneInputRow">
                                <div class="col-md-12 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="microphone_type"><?php _e( 'Ilość mikrofonów i ich rodzaj', 'lingualab' );?></label>
                                            <div class="col-md-8 input">
                                                <input id="microphone_type" class="" type="text" name="evaluation_form[microphone_type]" autocomplete="off">
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
