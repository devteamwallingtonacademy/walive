
                          <div class="subject_edit">
                            <div class="subject_practis">
                              <p class="subject">{{ $batch->id }}</p>
                              <p class="time_pera">
                                <span>{{ $batch->batch_start_date->format('Y-m-d')}},</span
                                ><span>04:00pm - 05:00pm</span>
                              </p>
                            </div>
                            <div class="starttime_block">
                              <p class="sub_subject">Start</p>
                              <p class="green_text">
                                <a href="{{ $batch->zoom->meeting_start_url }}" class="green_text">Start Meeting</a>
                              </p>
                            </div>
                            <div class="class_block">
                              <p class="sub_subject">Class</p>
                              <p class="blue_text">10th</p>
                            </div>
                            <div class="class_block">
                              <p class="sub_subject">Subject</p>
                              <p class="blue_text">Maths</p>
                            </div>
                            <div class="class_block">
                              <p class="sub_subject">Time</p>
                              <p class="blue_text">30 Min</p>
                            </div>
                            <div class="class_mb">
                              <p class="sub_subject">Students</p>
                              <p class="blue_text">30</p>
                            </div>
                            <div class="delite_icon">
                              <img
                                src="{{asset('wa/teacherdashboard/img/delete.svg')}}"
                                width="20"
                                height="20"
                              />
                            </div>
                            <div class="edit_icon">
                              <img src="{{asset('wa/teacherdashboard/img/edit.svg')}}" width="20" height="20" />
                            </div>
                          </div>
