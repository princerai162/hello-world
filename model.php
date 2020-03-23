<!---model to create events--->

<div class="modal fade" id="create_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<!-- begin:: Content -->
    <div class="modal-dialog modal-xl" role="document">
        
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet modal-content-radius">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_event" data-ktwizard-state="step-first">
                        <div class="kt-grid__item d-none">

                            <!--begin: Form Wizard Nav -->
                            <div class="kt-wizard-v3__nav">
                                <div class="kt-wizard-v3__nav-items kt-wizard-v3__nav-items--clickable">

                                    <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                                    <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                 Add New Event
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <small>Add new Event</small> Review
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Nav -->
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper modal-content-radius addform modal-body p-0">

                            <!--begin: Form Wizard Form-->
                            <form class="kt-form" id="kt_form_event" method="POST" action="{{route('createEvent')}}" enctype="multipart/form-data">
                                @csrf
                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="py-3">
									<h1 class="modal-title agent-title" id="exampleModalLabel">Add new Event</h1>
									<button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
									</button>
								</div> 
                                    <div class="kt-heading kt-heading--md">1ST STEP</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v3__form">
											<div class="row">
												<div class="col-md-6">
													<div class="row">
														<div class="form-group col-md-12">
															<input type="text" class="form-control" name="event_name" id="title" placeholder="Event Name" required>
														</div>
														<div class="form-group col-md-6">
															<input type="text" class="form-control datepicker_event" name="start_date" id="start_date" placeholder="from Date" required="required"/>
														</div>
														<div class="form-group col-md-6">
															<input type="text" class="form-control timepicker_event" name="start_time" id="start_time" required="required"/>
														</div>

														<div class="form-group col-md-6">
															<input type="text" class="form-control datepicker_event" name="end_date" id="end_date" placeholder="to Date" required="required"/>
														</div>
														<div class="form-group col-md-6">
															<input type="text" class="form-control timepicker_event" name="end_time" id="end_time" placeholder="to Time" required="required"/>
														</div>

														<div class="form-group col-md-12 repeat_type hidden">
															<select class="form-control modal-text-background repeat_type" name="repeat_type" id="repeat_type" required>
																<option value="">Select</option>
																<option value="1">Daily</option>
																<option value="2">Weekly</option>
																<option value="3">Monthly</option>
																<option value="4">Annually</option>
															</select>													
														</div>

														<div class="form-group col-md-12 ends_type hidden">
															<h5>Ends</h5>
															<div class="row d-flex align-items-center mb-3 mt-3">
																<div class="col-md-12">
																	<label class="kt-radio">
																		<input type="radio" id="never" name="ends_type" value="0">
																		Never <span></span>
																	</label>
																</div>
															</div>
															<div class="row d-flex align-items-center mb-3">
																<div class="col-md-3">
																	<label class="kt-radio">
																		<input type="radio" id="on" name="ends_type" value="1">On<span></span>
																	</label>
																</div>
																<div class="col-md-9">
																	<input class="form-control datepicker_event" type="text" name="ends_at" placeholder="Occurence End Date" />
																</div>														
															</div>
															<div class="row d-flex align-items-center mb-3">
																<div class="col-md-3">
																	<label class="kt-radio">
																		<input type="radio" id="after" name="ends_type" value="2">After<span></span>
																	</label>
																</div>
																<div class="col-md-3">
																	<input class="form-control" type="number" name="ends_at_occurence" min="1" value="10" />
																</div>
																<div class="col-md-6">
																	<p>Occurences</p>
																</div>													
															</div>
																												
														</div>

														<div class="form-group col-md-6">
															<label class="kt-checkbox">
																<input class="is_repeat_selector" type="checkbox" id="is_repeat" name="is_repeat" value="0"><u>Repeat?</u><span></span>
															</label>
														</div>

														<div class="form-group col-md-6">
															<label class="kt-checkbox">
																<input class="ends_type_selector" type="checkbox" name="ends_type_selector" value=""><u>Ends?</u><span></span>
															</label>
														</div>												

														<div class="form-group col-md-12">
															<input type="text" class="form-control" name="address" placeholder="Address" id="address" required>
														</div>
																											
														<div class="form-group col-md-12">
															<select class="form-control modal-text-background state_id_case" placeholder="State" name="state" id="state_id_case" required>
																<option value="">State</option>
																@foreach($states as $state)
																<option value="{{$state->id}}">{{$state->state_name}}</option>
																@endforeach	
															</select>														
														</div>

														<div class="form-group col-md-12">
															
															<select class="form-control modal-text-background county_case" placeholder="County" name="county" id="county_case" required>
															<option value="">County</option>
																	
															</select>
														</div>

														<div class="form-group col-md-12">
															<input type="text" class="form-control phone_us" id="phone_us" name="telephone" maxlength="14" autocomplete="off" required placeholder="Telephone">
														</div>

														<div class="form-group col-md-12">
															<input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required>
														</div>

														<div class="form-group col-md-12">
															<input type="text" class="form-control" name="website" id="website" placeholder="Website" required>
														</div>

													</div>
												
												</div>

												<div class="col-md-6">
													<div class="row">

													   <div class="form-group col-md-12 ktselect">
															<select class="form-control kt-selectpicker" multiple name="wellness[]" onchange="getdata('wellness', 'event_wellness')" required>
																<option value="">Dimensions of Wellness</option>
																@foreach($wellness as $well)
																<option  value="{{$well->id}}" data-content='<span> <img  src="{{asset('/uploads/wellness/'.$well->avatar)}}" alt="{{$well->name}}"/>{{$well->name}} </span>'>{{$well->name}}</option>
																@endforeach
															</select>
													   </div>

													   <div class="form-group col-md-12">
													   		<!--<input type="file" class="form-control file-input-case" name="attachments[]" data-attr="0"   id="attachments" onclick="myFunction(this, 0)">-->
															<input type="file" class="form-control modal-text-background" name="attachment" value="" required="required"/>
													   </div>

													   <div class="form-group col-md-12">
															<textarea class="form-control" placeholder="Type in the Event details here" name="event_details" rows="8" cols="4"></textarea>
													   </div>
													</div>
												</div>
											</div>
											 <!----------from now keen code ---->

                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 5-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
								
								<div class="kt-form__section kt-form__section--first pb-0">

									<div class="row">
										<div class="col-md-5">
											<div class="">
												<h3 class="kt-portlet__head-title head-titlecustom  pb-2" id="event_name">
												
												</h3>
												<div class="taglines">
													<small class="mr-4" id="event_date"></small>
													<small class="mr-4" id="event_time"></small> 
													<small class="" id="event_end_date"></small>
												</div>
												<div class="graylight d-flex align-items-center mt-3">
													<div class="mr-4">
													<small class="smalltext">Address</small>
													<div class="smalltexttitle" id="event_address"></div> 
													</div>
												</div>
												<div class="graylight d-flex align-items-center mb-5 mt-3">
													<div class="mr-4">
														<small class="smalltext">State</small>
														<div class="smalltexttitle" id="event_state"></div> 
													</div>
													<div>
													<small class="smalltext">County</small>
													<div class="smalltexttitle" id="event_county"></div> 
													</div>								
												</div>
												<div class="kt-portlet__head align-items-center border-0 pt-4 px-0 mt-5">
													<div class="kt-portlet__head-label p-0 pb-2">
														<span class="kt-portlet__head-icon">
															<div class="kt-user-card-v2">
																<div class="kt-user-card-v2__pic">
																	<img src="{{ asset('uploads/avatar/default.png') }}" alt="photo">
																</div>
															</div>
														</span>
														<h3 class="kt-portlet__head-title">
															<small class="smalltext">{{$role_name->implode(' ')}}</small>
															<div class="smalltexttitle">{{ Auth::user()->name }}</div>									
														</h3>
													</div>
												</div>
												<div class="CasesDet mt-4">
													<div class="textSs" id="event_telephone"></div>
													<div class="textSs mt-3" id="event_email"></div>
													<div class="textSs mt-3" id="event_website"></div>
													<div class="textSs mt-4" id="form_address"></div>
												</div>
											</div>											
										</div>
										<div class="col-md-7">
											<div class="smalltexts">Dimensions of wellness</div>
												<button type="button" class="btn btn-success btn-pill btn-elevate-air btn-sm btnxs" id="event_wellness"></button>
												<div class="kt-portlet--tabs">
													<div class="kt-portlet__head border-0 p-0">
														<div class="kt-portlet__head-label pb-0 pt-4">
															<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand ml-0" role="tablist">
																<li class="nav-item">
																	<a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
																		Description
																	</a>
																</li>
															</ul>  
														</div> 															
													</div>
													<div class="kt-portlet__body casesDeinfo px-0 pb-0">
														<div class="tab-content">
															<div class="tab-pane active" id="kt_widget4_tab1_content">
																<div class="kt-widget4">
																	<p id="event_details"></p>																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Success popup code start 
								<div class="Successpage"> 
									<h1>Success!</h1> 
									<p>We have received your submission successfully</p>
								</div>
								 Success popup code End -->

                                <!--end: Form Wizard Step 5-->
								
									
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions modal-footer">
                                    <button class="btn btn-secondary" data-ktwizard-type="action-prev">
                                        Previous
                                    </button>
                                    <button class="btn btn-outline-primary" data-ktwizard-type="action-submit">
                                        Submit
                                    </button>

                                    <button class="btn btn-outline-primary" data-ktwizard-type="action-next" id="event_next">
                                        Next 
                                    </button>
                                </div>

								<input type="hidden" id="latitude" name="latitude" value=""/>
								<input type="hidden" id="longitude" name="longitude" value="" />

                                <!--end: Form Actions -->
                            </form>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
