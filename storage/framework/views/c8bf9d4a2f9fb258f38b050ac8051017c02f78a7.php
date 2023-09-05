<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Email')); ?>

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
<section class="mt-3">
    <div class="container-fluid p-0">
	    <div class="row">
	    	<div class="col-lg-12">
	            <div class="card mb-4">
	                <div class="card-body">

	                    <form action="" method="GET">
	                        <div class="row align-items-center">
	                            <div class="col-lg-5">
	                                <label> <?php echo e(__('By User/Email/To Recipient Email')); ?></label>
	                                <input type="text" autocomplete="off" name="search" value="" placeholder="<?php echo app('translator')->get('Search with User, Email or To Recipient Email'); ?>" class="form-control" id="search" value="<?php echo e(@$search); ?>">
	                            </div>
	                            <div class="col-lg-5">
	                                <label>
                                        <?php echo e(__('By Date')); ?>

                                    </label>
	                                <input type="text" class="form-control datepicker-here" name="date" value="<?php echo e(@$searchDate); ?>" data-range="true" data-multiple-dates-separator=" - " data-language="en" data-position="bottom right" autocomplete="off" placeholder="<?php echo app('translator')->get('From Date-To Date'); ?>" id="date">
	                            </div>
	                            <div class="col-lg-2">
	                                <button class="btn btn--primary w-100 h-45 mt-4" type="submit">
	                                    <i class="fas fa-search"></i> <?php echo e(__('Search')); ?>

	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            <div class="col-lg-2 statusUpdateBtn d-none">
	                <button class="btn btn--danger w-100 statusupdate text-white"
	                		data-bs-toggle="tooltip"
	                        data-bs-placement="top" title="Status Update"
	                        data-bs-toggle="modal"
	                        data-bs-target="#smsstatusupdate"
	                        type="submit">
	                    <i class="fas fa-gear"></i> <?php echo e(__('Action')); ?>

	                </button>
	            </div>
	        </div>

	 		<div class="col-lg-12 mt-2">
	            <div class="card mb-4">
	                <div class="responsive-table">
                        <table class="table datatable">
		                    <thead>
		                        <tr>
                                    <th>
                                    	<div class="d-flex align-items-center">
                                    		<input class="form-check-input mt-0 me-2 checkAll"
                                               type="checkbox"
                                               value=""
                                               aria-label="Checkbox for following text input"> <span>#</span>
                                    	</div>
                                    </th>
		                            <th> <?php echo e(__('User')); ?></th>
		                            <th> <?php echo e(__('Sender')); ?></th>
		                            <th> <?php echo e(__('To')); ?></th>
		                            <th> <?php echo e(__('Subject')); ?></th>
		                            <th> <?php echo e(__('Initiated')); ?></th>
		                            <th> <?php echo e(__('Status')); ?></th>
		                            <th> <?php echo e(__('Action')); ?></th>
		                        </tr>
		                    </thead>
		                    <?php $__empty_1 = true; $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			                    <tr class="<?php if($loop->even): ?> table-light <?php endif; ?>">
                                    <td class="d-none d-md-flex align-items-center">
                                        <input class="form-check-input mt-0 me-2" type="checkbox" name="emaillog" value="<?php echo e($email->id); ?>" aria-label="Checkbox for following text input">
                                        <?php echo e($loop->iteration); ?>

                                    </td>

				                     <td data-label=" <?php echo e(__('User')); ?>">
				                     	<?php if($email->user_id): ?>
				                    		<a href="<?php echo e(route('admin.user.details', $email->user_id)); ?>" class="fw-bold text-dark"><?php echo e($email->user->email); ?></a>
				                    	<?php else: ?>
				                    		<span> <?php echo e(__('Admin')); ?></span>
				                    	<?php endif; ?>
				                    </td>

				                    <td data-label=" <?php echo e(__('Sender')); ?>">
				                      	<span class="text--primary fw-bold"><?php echo e(ucfirst(@$email->sender->name)); ?></span>
				                    </td>

				                    <td data-label=" <?php echo e(__('To')); ?>">
				                    	<?php echo e($email->to); ?>

				                    </td>

				                    <td data-label=" <?php echo e(__('Subject')); ?>">
				                    	<?php echo e($email->subject); ?>

				                    </td>

				                    <td data-label=" <?php echo e(__('Initiated')); ?>">

				                    </td>

				                    <td data-label=" <?php echo e(__('Status')); ?>">
				                    	<?php if($email->status == 1): ?>
				                    		<span class="badge badge--primary"> <?php echo e(__('Pending ')); ?></span>
				                    	<?php elseif($email->status == 2): ?>
				                    		<span class="badge badge--info"> <?php echo e(__('Schedule')); ?></span>
				                    	<?php elseif($email->status == 3): ?>
				                    		<span class="badge badge--danger"> <?php echo e(__('Fail')); ?></span>
				                    	<?php else: ?>
				                    		<span class="badge badge--success"> <?php echo e(__('Delivered')); ?></span>
				                    	<?php endif; ?>
				                    	<a class="s_btn--coral text--light statusupdate"
				                    		data-id="<?php echo e($email->id); ?>"
				                    		data-bs-toggle="tooltip"
				                    		data-bs-placement="top" title="Status Update"
				                    		data-bs-toggle="modal"
				                    		data-bs-target="#smsstatusupdate"
			                    			><i class="las la-info-circle"></i></a>
				                    </td>

				                    <td data-label=" <?php echo e(__('Action')); ?>">
				                    	<?php if($email->status == 1): ?>
				                    		<a href="<?php echo e(route('admin.email.single.mail.send', $email->id)); ?>" class="btn--warning text--light" data-bs-toggle="tooltip" data-bs-placement="top" title="Resend" ><i class="las la-paper-plane"></i></a>
				                    	<?php endif; ?>
			                    		<a class="btn--primary text--light" href="" target="_blank"
				                    		><i class="las la-desktop"></i></a>
                                        <a class="btn--primary text--light" href="" target="_blank"
				                    		><i class="las la-desktop"></i></a>

				                    	<a href="javascript:void(0)" class="btn--danger text--light emaildelete"
				                    		data-bs-toggle="modal"
				                    		data-bs-target="#delete"
				                    		data-delete_id="<?php echo e($email->id); ?>"
				                    		><i class="las la-trash"></i>
				                    	</a>
				                    </td>
			                    </tr>
			                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			                	<tr>
			                		<td class="text-muted text-center" colspan="100%"> <?php echo e(__('No Data Found')); ?></td>
			                	</tr>
			                <?php endif; ?>
		                </table>
	            	</div>
	                <div class="m-3">

					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>


<div class="modal fade" id="smsstatusupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

			<form action="" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id">
				<input type="hidden" name="emaillogid">
	            <div class="modal-body">
	            	<div class="card">
	            		<div class="card-header bg--lite--violet">
	            			<div class="card-title text-center text--light"> <?php echo e(__('Email Status Update')); ?></div>
	            		</div>
		                <div class="card-body">
							<div class="mb-3">
								<label for="status" class="form-label"> <?php echo e(__('Status')); ?> <sup class="text--danger">*</sup></label>
								<select class="form-control" name="status" id="status" required>
									<option value="" selected disabled> <?php echo e(__('Select Status')); ?></option>
									<option value="1"> <?php echo e(__('Pending')); ?></option>
									<option value="3"> <?php echo e(__('Failed')); ?></option>
								</select>
							</div>
						</div>
	            	</div>
	            </div>

	            <div class="modal_button2">
	                <button type="button" class="" data-bs-dismiss="modal"> <?php echo e(__('Cancel')); ?></button>
	                <button type="submit" class="bg--success"> <?php echo e(__('Submit')); ?></button>
	            </div>
	        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="smsdetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            	<div class="card">
            		<div class="card-header bg--lite--violet">
            			<div class="card-title text-center text--light"> <?php echo e(__('Message')); ?></div>
            		</div>
        			<div class="card-body mb-3">
        				<p id="message--text"></p>
        			</div>
        		</div>
        	</div>

            <div class="modal_button2">
                <button type="button" class="w-100" data-bs-dismiss="modal"> <?php echo e(__('Cancel')); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        	<form action="" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id" value="">
	            <div class="modal_body2">
	                <div class="modal_icon2">
	                    <i class="las la-trash-alt"></i>
	                </div>
	                <div class="modal_text2 mt-3">
	                    <h6> <?php echo e(__('Are you sure to delete this email from log')); ?></h6>
	                </div>
	            </div>
	            <div class="modal_button2">
	                <button type="button" class="" data-bs-dismiss="modal"> <?php echo e(__('Cancel')); ?></button>
	                <button type="submit" class="bg--danger"> <?php echo e(__('Delete')); ?></button>
	            </div>
	        </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scriptpush'); ?>
<script>
	(function($){
		"use strict";
		$('.statusupdate').on('click', function(){
			var modal = $('#smsstatusupdate');
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		// $('.details').on('click', function(){
		// 	var modal = $('#smsdetails');
		// 	var message = $(this).data('message');
		// 	$("#message--text").empty();
		// 	$("#message--text").append(message);
		// 	modal.modal('show');
		// });

		$('.emaildelete').on('click', function(){
			var modal = $('#delete');
			modal.find('input[name=id]').val($(this).data('delete_id'));
			modal.modal('show');
		});

        $('.checkAll').click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('.statusupdate').on('click', function(){
            var modal = $('#smsstatusupdate');
            var newArray = [];
            $("input:checkbox[name=emaillog]:checked").each(function(){
                newArray.push($(this).val());
            });
            modal.find('input[name=emaillogid]').val(newArray.join(','));
            modal.modal('show');
        });
	})(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Utente\Documents\GitHub\fintechcoin\resources\views/email/index.blade.php ENDPATH**/ ?>