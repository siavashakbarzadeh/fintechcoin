<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Document')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Document')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create document')): ?>
            <a href="#" data-url="<?php echo e(route('document-upload.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Document Type')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"  class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="mt-3 rounded_box">
	<div class="container-fluid p-0 pb-2">
		<div class="row d-flex align--center rounded">
			<div class="col-xl-12">
				<div class="col-xl">

					<form action="" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
					    <div class="card mb-2">
						    <h6 class="card-header"><?php echo e(__('Recipient Set In Different Ways')); ?></h6>
						    <div class="card-body">
					    		<div class="row">

									<div class="col-md-4 mb-2">
										<div class="mb-3">
											<label class="form-label">
												<?php echo e(__('Single Input')); ?>

											</label>
											<div class="input-group input-group-merge">
												<select class="form-control emailcollect" name="email[]" id="email" multiple>
												</select>
											</div>
											<div class="form-text">
						            			<?php echo e(__('Put single or search from save contact')); ?>

											</div>
										</div>
									</div>

					          		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			<?php echo e(__('From Group')); ?>

					            		</label>
					            		<div class="input-group input-group-merge">
								            <select class="form-control keywords" name="email_group_id[]" id="group" multiple="multiple">
												<option value="" disabled=""><?php echo e(__('Select One')); ?>


                                                </option>





											</select>
					            		</div>
					            		<div class="form-text">
					            			<?php echo e(__('Can be select single or multiple group')); ?>

										</div>
					          		</div>
					          		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			<?php echo e(__('Import File')); ?>

					            		</label>
					            		<div class="input-group input-group-merge">
					              			<input class="form-control" type="file" name="file" id="file">
					            		</div>
					            		<div class="form-text">
					            			<?php echo e(__('Download Sample: ')); ?>






                                        </div>
					          		</div>
					    		</div>
					      	</div>
					    </div>

					    <div class="card mb-2">
						    <h6 class="card-header"><?php echo e(__('Email Header Information')); ?></h6>
						    <div class="card-body">
						    	<div class="row">
						    		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			<?php echo e(__('Subject')); ?> <sup class="text-danger">*</sup>
					            		</label>
					            		<div class="input-group input-group-merge">
					              			<input type="text"  value="<?php echo e(old("subject")); ?>" name="subject" id="subject" class="form-control" placeholder="<?php echo e(__('Write email subject here')); ?>">
					            		</div>
					          		</div>
						    		<div class="col-md-4 mb-2">
										<label class="form-label">
											<?php echo e(__('Send From')); ?>

										</label>
										<div class="input-group input-group-merge">
												<input class="form-control" value="<?php echo e(old("from_name")); ?>" placeholder="<?php echo e(__('Sender Name (Optional)')); ?>" type="text" name="from_name" id="from_name">
										</div>
									</div>
									<div class="col-md-4 mb-2">
										<label class="form-label">
											<?php echo e(__('Reply To Email')); ?>

										</label>
										<div class="input-group input-group-merge">
												<input class="form-control" value="<?php echo e(old("reply_to_email")); ?>" type="email" placeholder="<?php echo e(__('Reply To Email (Optional)')); ?>" name="reply_to_email" id="reply_to_email">
										</div>
									</div>
						    	</div>
						    </div>
						</div>

					    <div class="card mb-2">
						    <h6 class="card-header"><?php echo e(__('Email Body')); ?></h6>
						    <div class="card-body">
				          		<div class="row">
					          		<div class="col-12">
					            		<label class="form-label">
					            			<?php echo e(__('Message Body')); ?> <sup class="text-danger">*</sup>
					            		</label>
					            		<div class="input-group">
					            			<textarea  class="form-control" name="message" id="message" rows="2"> <?php echo e(old("message")); ?>  </textarea>
					            		</div>
					          		</div>
				          		</div>
					      	</div>
					    </div>

					    <div class="card mb-2">
						    <h6 class="card-header"><?php echo e(__('Sending Options')); ?></h6>
						    <div class="card-body">
				          		<div class="row">
				          			<div class="col-md-6 mb-4">
					            		<label for="schedule" class="form-label"><?php echo e(__('Send Email')); ?> <sup class="text-danger">*</sup></label>
										<div>
											<div class="form-check form-check-inline">
												<input <?php echo e(old("schedule") ==  '1'? "checked" :""); ?> class="form-check-input" type="radio" name="schedule" id="schedule" value="1" checked="">
												<label class="form-check-label" for="schedule"><?php echo e(__('Now')); ?></label>
											</div>

											<div class="form-check form-check-inline">
												<input  <?php echo e(old("schedule") ==  '2'? "checked" :""); ?> class="form-check-input" type="radio" name="schedule" id="schedule2" value="2">
												<label class="form-check-label" for="schedule2"><?php echo e(__('Later')); ?></label>
											</div>
										</div>
					          		</div>
					          		<div class="col-md-6 scheduledate"></div>
				          		</div>
				          	</div>
				        </div>

					    <button type="submit" class="btn btn-primary me-sm-3 me-1">
							<?php echo e(__("Submit")); ?>

						</button>
				    </form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scriptpush'); ?>
<script>
	(function($){
		"use strict";
		
		selectSearch("")

		$('.keywords').select2({
			tags: true,
			tokenSeparators: [',']
		});


		function selectSearch(route){
			$(`.emailcollect`).select2({
            allowClear: false,
            tags: true,
            tokenSeparators: [' '],
            placeholder: '',
            ajax: {
                url: route,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true
            }
          });
		}

		// if($('.checked_opt').is(":checked")) {
	    //     $("#optional_info").show(300);
	    // } else {
	    //     $("#optional_info").hide(200);
	    // }
		// $(".checked_opt").click(function() {
		//     if($(this).is(":checked")) {
		//         $("#optional_info").show(300);
		//     } else {
		//         $("#optional_info").hide(200);
		//     }
		// });

		$('input[type=radio][name=schedule]').on('change', function(){
	        if(this.value == 2){
                const __ =  "<?php echo e(__('Schedule Date & Time')); ?>"
	        	var html = `
	        		<label for="shedule_date" class="form-label">${__}<sup class="text-danger">*</sup></label>
					<input type="datetime-local" value= "<?php echo e(old("shedule_date")); ?>" name="shedule_date" id="shedule_date" class="form-control" required="">`;
	        	$('.scheduledate').append(html);
	        }else{
	        	$('.scheduledate').empty();
	        }
	    });


		$(document).ready(function() {
	        // $('#message').summernote({
		    //     placeholder: '<?php echo e(__('Write Here Email Content &  For Mention Name Use ')); ?>'+'{'+'{name}'+"}",
		    //     tabsize: 2,
		    //     width:'100%',
		    //     height: 200,
		    //     toolbar: [
			//         ['fontname', ['fontname']],
			//         ['style', ['style']],
			//         ['fontsize', ['fontsizeunit']],
			//         ['font', ['bold', 'underline', 'clear']],
			//         ['height', ['height']],
			//         ['color', ['color']],
			//         ['para', ['ul', 'ol', 'paragraph']],
			//         ['table', ['table']],
			//         ['insert', ['link', 'picture', 'video']],
			//         ['view', ['codeview']],
		    //     ],
		    //     codeviewFilterRegex: 'custom-regex'
		    // });
			CKEDITOR.ClassicEditor.create(document.getElementById("message"), {
		        placeholder: document.getElementById("message").getAttribute("placeholder"),
		        toolbar: {
		          items: [
		            'heading',
		            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
		            'alignment', '|',
		            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', 'findAndReplace', '-',
		            'bulletedList', 'numberedList', '|',
		            'outdent', 'indent', '|',
		            'undo', 'redo',
		            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
		            'horizontalLine', 'pageBreak', '|',
		            'sourceEditing'
		          ],
		          shouldNotGroupWhenFull: true
		        },
		        list: {
		          properties: {
		            styles: true,
		            startIndex: true,
		            reversed: true
		          }
		        },
		        heading: {
		          options: [
		            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
		            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
		            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
		            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
		            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
		            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
		            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
		          ]
		        },
		        fontFamily: {
		          options: [
		            'default',
		            'Arial, Helvetica, sans-serif',
		            'Courier New, Courier, monospace',
		            'Georgia, serif',
		            'Lucida Sans Unicode, Lucida Grande, sans-serif',
		            'Tahoma, Geneva, sans-serif',
		            'Times New Roman, Times, serif',
		            'Trebuchet MS, Helvetica, sans-serif',
		            'Verdana, Geneva, sans-serif'
		          ],
		          supportAllValues: true
		        },
		        fontSize: {
		          options: [10, 12, 14, 'default', 18, 20, 22],
		          supportAllValues: true
		        },
		        htmlSupport: {
		          allow: [
		            {
		              name: /.*/,
		              attributes: true,
		              classes: true,
		              styles: true
		            }
		          ]
		        },
		        htmlEmbed: {
		          showPreviews: true
		        },
		        link: {
		          decorators: {
		            addTargetToExternalLinks: true,
		            defaultProtocol: 'https://',
		            toggleDownloadable: {
		              mode: 'manual',
		              label: 'Downloadable',
		              attributes: {
		                download: 'file'
		              }
		            }
		          }
		        },
		        mention: {
		          feeds: [
		            {
		              marker: '@',
		              feed: [
		                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
		                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
		                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
		                '@sugar', '@sweet', '@topping', '@wafer'
		              ],
		              minimumCharacters: 1
		            }
		          ]
		        },
		        removePlugins: [
		          'CKBox',
		          'CKFinder',
		          'EasyImage',
		          'RealTimeCollaborativeComments',
		          'RealTimeCollaborativeTrackChanges',
		          'RealTimeCollaborativeRevisionHistory',
		          'PresenceList',
		          'Comments',
		          'TrackChanges',
		          'TrackChangesData',
		          'RevisionHistory',
		          'Pagination',
		          'WProofreader',
		          'MathType'
		        ]
		    });
	    });
	})(jQuery);
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Utente\Documents\GitHub\fintechcoin\resources\views/email/create.blade.php ENDPATH**/ ?>