<fieldset>
                            <legend>Szczegóły - tłumaczenia ustne wraz ze sprzętem</legend>
                            <div class="row efFieldRow oneInputRow">
                                <div class="col-md-12 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="evaluationFormService">Rodzaj tłumaczenia:</label>
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
                                            <label class="col-md-4 label" for="client_company">Miasto / Miejsce:</label>
                                            <div class="col-md-8 input">
                                                <input id="client_company" class="" type="text" name="client_company" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company">Tematyka tłumaczenia</label>
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
                                                <label class="col-md-4 label" for="optional_comment">Pierwszy dzień: <span>Data:</span></label>
                                                <div class="col-md-8 input">
                                                    <input id="deadline" class="dateInput" type="text" name="daylist[1][deadline]" autocomplete="off" placeholder="dd , mm , rrrr">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 efField dayTime">
                                        <div class="efFieldContent">
                                            <div class="row efFieldContentRow">
                                                <label class="col-md-4 label" for="optional_comment">Od:</label>
                                                <div class="col-md-8 input">
                                                <select name="daylist[1][from]" id="evaluationFormService">
                                                  <?php
                                                  $time_start = get_field('earliest_hour',103);
                                                  $time_end = get_field('latest_hour',103);
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
                                                <label class="col-md-4 label" for="optional_comment">Do:</label>
                                                <div class="col-md-8 input">
                                                <select name="daylist[1][to]" id="evaluationFormService">
                                                  <?php
                                                  $time_start = get_field('earliest_hour',103);
                                                  $time_end = get_field('latest_hour',103);
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
                                                   <span class="col-md-5 addNextDayLabel">Kolejny<br>dzień:</span>
                                                    <button class="col-md-7 addNextDay" data-id="1">Dodaj</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row efFieldRow twoInputRow">
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company">Dla ilu osób zapewnić odbiorniki przekazu:</label>
                                            <div class="col-md-8 input">
                                                <input id="client_company" class="" type="text" name="client_company" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 efField">
                                    <div class="efFieldContent">
                                        <div class="row efFieldContentRow">
                                            <label class="col-md-4 label" for="client_company">Nagłośnienie:</label>
                                            <div class="col-md-8 input">
                                              <select name="service_type">
                                                  <option value="">TAK, należy zapewnić</option>
                                                  <option value="">NIE, jest dostępne na sali</option>
                                                  <option value="">Nie wiem</option>

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
                                            <label class="col-md-4 label" for="optional_comment">Ilość mikrofonów i ich rodzaj</label>
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
                                            <label class="col-md-4 label" for="optional_comment">Dodatkowy komentarz</label>
                                            <div class="col-md-8 input">
                                                <input id="optional_comment" class="" type="text" name="optional_comment" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
