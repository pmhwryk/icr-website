

                        <?php foreach($points as $point): ?>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" readonly class="form-control m-input" id="title" name="pointt[]" value="<?=(isset($point['title']) && !empty($point['title']) ? $point['title'] : '')?>">
									<input type="hidden" readonly class="form-control m-input" id="title" name="pointt_id[]" value="<?=(isset($point['id']) && !empty($point['id']) ? $point['id'] : '')?>">
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="input-group m-input-group m-input-group--square">
									
                                <select class="custom-select form-control notrequired" id="custom-select" name="selection[]" >
                                                   <option value="0" selected="">Include or not</option>
                                                   <option value="yes">Yes</option>	
                                                   <option value="no">No</option>	    
                                </select>
								</div>
                            </div>
                        </div> 
                        <?php endforeach; ?>
                     
                        
                       
					   
					   
						

						

			
			<!-- end input for inclueds items-->

					
