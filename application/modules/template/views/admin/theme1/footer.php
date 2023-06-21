<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<!-- <span class="m-footer__copyright">
					<?php date_default_timezone_set("Asia/Karachi"); ?>
					2019-<?php echo date("Y"); ?> &copy; Design and Developed by
					<a href="https://hwryk.com" target="_blank" class="m-link">
						Hello World Technologies
					</a>
				</span> -->
			</div>
			<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
				<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
					<li class="m-nav__item">
						<a href="javascript:void(0);" class="m-nav__link">
							<span class="m-nav__link-text">
								About
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="javascript:void(0);" class="m-nav__link">
							<span class="m-nav__link-text">
								Privacy
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="javascript:void(0);" class="m-nav__link">
							<span class="m-nav__link-text">
								T&C
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="javascript:void(0);" class="m-nav__link">
							<span class="m-nav__link-text">
								Purchase
							</span>
						</a>
					</li>
					<li class="m-nav__item m-nav__item">
						<a href="javascript:void(0);" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
							<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->
<!-- <ul class="m-nav-sticky" style="margin-top: 30px;">
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
			<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">
				<i class="la la-cart-arrow-down"></i>
			</a>
		</li>
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
			<a href="https://keenthemes.com/metronic/documentation.html" target="_blank">
				<i class="la la-code-fork"></i>
			</a>
		</li>
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
			<a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
				<i class="la la-life-ring"></i>
			</a>
		</li>
	</ul> -->
<div class="modal fade" id="detail_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">
					<?php
					echo ucfirst(ucfirst(preg_replace('/[^a-zA-Z0-9]+/', ' ', $this->uri->segment(2))));
					?>&nbsp;Details
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="password_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">
					Change&nbsp;
					<?php
					echo ucfirst(ucfirst(preg_replace('/[^a-zA-Z0-9]+/', ' ', $this->uri->segment(2))));
					?>
					&nbsp;Password
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary submit_password">
					Submit
				</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="<?= STATIC_ADMIN_JS ?>admin_vendor_bundle.js" type="text/javascript"></script>
<script src="<?= STATIC_ADMIN_JS ?>admin_scripts_bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="<?= STATIC_ADMIN_JS ?>admin_fullcalendar_bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="<?= STATIC_ADMIN_JS ?>admin_dashboard.js" type="text/javascript"></script>
<script src="<?= STATIC_ADMIN_JS ?>admin_datatables_bundle.js" type="text/javascript"></script>
<script src="<?= STATIC_ADMIN_JS ?>admin_html.js" type="text/javascript"></script>
<script src="<?= STATIC_ADMIN_JS ?>admin_toastr.js"></script>
<script src="<?php echo STATIC_ADMIN_JS ?>tinymce/tinymce.min.js"></script>
<!-- BOOTSTRAP FILEUPLOAD-->
<script src="<?php echo STATIC_ADMIN_JS ?>bootstrap-fileupload.js"></script>
<script src="<?php echo STATIC_ADMIN_JS ?>bootstrap-datepicker.js"></script>
<script src="<?php echo STATIC_ADMIN_JS ?>toastr.js"></script>
<script src="<?php echo STATIC_ADMIN_JS ?>select2.js"></script>
<script>
	function toaster_success_setting() {
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": true,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
	}
	tinymce.init({
		theme: 'advanced',
		resize: false,
		fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
		selector: "textarea.ckeditor",
		theme: "modern",
		width: '100%',
		height: 500,
		autoresize_min_height: 500,
		autoresize_max_height: 800,
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks code fullscreen visualchars insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons paste textcolor responsivefilemanager autoresize"
		],
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | fontselect |  fontsizeselect ",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect ",
		image_advtab: true,
		external_filemanager_path: "<?= BASE_URL ?>/filemanager/",
		filemanager_title: "filemanager",
		external_plugins: {
			"filemanager": "<?= BASE_URL ?>filemanager/plugin.min.js"
		}
	});
</script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>

<script type="text/javascript">
	$(".file_remove").click(function(event) {
		event.preventDefault()
		$parent = $(this).parent()
		$parentparent = $(this).parent().parent()
		$parent.find("input[type='file']").val("")
		$parentparent.find(".fileupload-preview").html("")
		$parentparent.removeClass("fileupload-exists")
	})
</script>