
				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
					<thead>
						<tr>
							<th>
								S.No
							</th>
							<th>
								Title
							</th>
							<th>
								Url slug
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                    	$i=0;
                        if (isset($query)) {
                        	foreach ($query->result() as $row):
                        		$i++;   
                        		if (!isset($return_page))
									$return_page = 0;
                        		$edit_url = ADMIN_BASE_URL . 'webpages/create/' . $row->id;
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row->page_title; ?>
							</td>
							<td>
								<?php echo $row->url_slug; ?>
							</td>
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a><?php $prefixID = 'desc'; ?>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=$row->id?>"><i class="flaticon-file"></i> Detail</a>
									    <a class="dropdown-item action_top_page" href="javascript:void(0);" rel="<?=$row->id?>"  id ="<?php echo $prefixID."-".$row->id; ?>" status ="<?php echo $row->show_in_toppanel; ?>"><?php if ($row->show_in_toppanel == 1) {?><i class="fa fa-chain"></i><?php } else {?><i class="fa fa-chain-broken"></i><?php } ?> Show in Header</a>
									    <a class="dropdown-item action_footer_page" href="javascript:void(0);" rel="<?=$row->id?>" id ="<?php echo $prefixID."-".$row->id; ?>" status ="<?php echo $row->show_in_footer; ?>"><?php if ($row->show_in_footer == 1) {?><i class="fa fa-chain"></i><?php } else {?><i class="fa fa-chain-broken"></i><?php } ?> Show in Footer</a>
										<a class="dropdown-item " href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=$row->id?>"><i class="fa fa-trash-o"></i> Delete</a>
									</div>
								</span>
							</td>
						</tr>
							<?php endforeach;
						} ?>
					</tbody>
				</table>
