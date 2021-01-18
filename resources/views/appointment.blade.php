<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="th-appointment-modal">
                <div class="th-appointmentcounters">
                    <div class="th-formhead">
                        <i><img src="/images/icon/img-25.png" alt="image description"></i>
                        <h3>For Appointment<span>No Need for A Queue</span></h3>
                    </div>
                    <form class="th-formappointment" action="{{ url('headForm') }}" method="POST">
                        {{ csrf_field() }}
                        {!! honeypot('honeypot_name', 'honeypot_time') !!}
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="enteryourname" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="text" name="yourphonebumber" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="agee" class="form-control" placeholder="your Agee">
                            </div>
                            <div class="form-group">
									<span class="th-select">
										<select>
											<option>Gender</option>
											<option>Male</option>
											<option>Female</option>
										</select>
									</span>
                            </div>
                            <div class="form-group">
									<span class="th-select">
										<select>
											<option>Select a Department</option>
											<option>Select a Department</option>
											<option>Select a Department</option>
										</select>
									</span>
                            </div>
                            <div class="form-group">
                                <div class="th-dateinputicon">
                                    <i class="fa fa-calendar"></i>
                                    <input type="text" name="date" class="form-control th-datetimepicker" placeholder="Date or time to visit">
                                </div>
                            </div>
                            <button class="th-btnform th-btnform-lg" type="submit">submit request</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
