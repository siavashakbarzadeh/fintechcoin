@extends('layouts.admin')

@section('page-title')
    {{__('Manage Document')}}
@endsection
@push('css-page')
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.6.0/dist/multiple-select.min.css">
    <style>
        select {
            width: 100%;
        }

        .ms-parent .placeholder{
            background-color: unset !important;
        }
    </style>
@endpush
@push('script-page')
    <script src="https://unpkg.com/multiple-select@1.6.0/dist/multiple-select.min.js"></script>
    <script>
        $(function () {
            $('select').multipleSelect({
                placeholder:"Select customers"
            })
        })
    </script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Document')}}</li>
@endsection

@section('action-btn')
    <div class="float-end">
        @can('create document')
            <a href="#" data-url="{{ route('document-upload.create') }}" data-ajax-popup="true" data-title="{{__('Create New Document Type')}}" data-bs-toggle="tooltip" title="{{__('Create')}}"  class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>

        @endcan
    </div>
@endsection
@section('content')
<section class="mt-3 rounded_box">
	<div class="container-fluid p-0 pb-2">
		<div class="row d-flex align--center rounded">
			<div class="col-xl-12">
				<div class="col-xl">
{{--					<form action="{{route('admin.email.store')}}" method="POST" enctype="multipart/form-data">--}}
					<form action="" method="POST" enctype="multipart/form-data">
						@csrf
					    <div class="card mb-2">
						    <h6 class="card-header">{{ __('Recipient Set In Different Ways')}}</h6>
						    <div class="card-body">
					    		<div class="row">

									<div class="col-md-4 mb-2">
										<div class="mb-3">
                                            <div class="input-group input-group-merge">
                                                <select multiple="multiple" class="multiple-select">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
										</div>
									</div>

					          		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			{{ __('From Group')}}
					            		</label>
					            		<div class="input-group input-group-merge">
								            <select class="form-control keywords" name="email_group_id[]" id="group" multiple="multiple">
												<option value="" disabled="">{{ __('Select One')}}

                                                </option>
{{--												@foreach($emailGroups as $group)--}}
{{--													<option--}}
{{--													@if (old("email_group_id")){{ (in_array($group->id, old("email_group_id")) ? "selected":"") }}@endif--}}
{{--													value="{{$group->id}}">{{$group->name}}</option>--}}
{{--												@endforeach--}}
											</select>
					            		</div>
					            		<div class="form-text">
					            			{{ __('Can be select single or multiple group')}}
										</div>
					          		</div>
					          		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			{{ __('Import File')}}
					            		</label>
					            		<div class="input-group input-group-merge">
					              			<input class="form-control" type="file" name="file" id="file">
					            		</div>
					            		<div class="form-text">
					            			{{ __('Download Sample: ')}}
{{--                                            --}}
{{--											<a href="{{route('demo.email.file.downlode', 'csv')}}"><i class="fa fa-download" aria-hidden="true"></i> {{ __('csv')}}, </a>--}}
{{--											--}}
{{--                                            <a href="{{route('demo.email.file.downlode', 'xlsx')}}"><i class="fa fa-download" aria-hidden="true"></i> {{ __('xlsx')}}</a>--}}

                                        </div>
					          		</div>
					    		</div>
					      	</div>
					    </div>

					    <div class="card mb-2">
						    <h6 class="card-header">{{ __('Email Header Information')}}</h6>
						    <div class="card-body">
						    	<div class="row">
						    		<div class="col-md-4 mb-2">
					            		<label class="form-label">
					            			{{ __('Subject')}} <sup class="text-danger">*</sup>
					            		</label>
					            		<div class="input-group input-group-merge">
					              			<input type="text"  value="{{old("subject")}}" name="subject" id="subject" class="form-control" placeholder="{{ __('Write email subject here')}}">
					            		</div>
					          		</div>
						    		<div class="col-md-4 mb-2">
										<label class="form-label">
											{{ __('Send From')}}
										</label>
										<div class="input-group input-group-merge">
												<input class="form-control" value="{{old("from_name")}}" placeholder="{{ __('Sender Name (Optional)')}}" type="text" name="from_name" id="from_name">
										</div>
									</div>
									<div class="col-md-4 mb-2">
										<label class="form-label">
											{{ __('Reply To Email')}}
										</label>
										<div class="input-group input-group-merge">
												<input class="form-control" value="{{old("reply_to_email")}}" type="email" placeholder="{{ __('Reply To Email (Optional)')}}" name="reply_to_email" id="reply_to_email">
										</div>
									</div>
						    	</div>
						    </div>
						</div>

					    <div class="card mb-2">
						    <h6 class="card-header">{{ __('Email Body')}}</h6>
						    <div class="card-body">
				          		<div class="row">
					          		<div class="col-12">
					            		<label class="form-label">
					            			{{ __('Message Body')}} <sup class="text-danger">*</sup>
					            		</label>
					            		<div class="input-group">
					            			<textarea  class="form-control" name="message" id="message" rows="2"> {{old("message")}}  </textarea>
					            		</div>
					          		</div>
				          		</div>
					      	</div>
					    </div>

					    <div class="card mb-2">
						    <h6 class="card-header">{{ __('Sending Options')}}</h6>
						    <div class="card-body">
				          		<div class="row">
				          			<div class="col-md-6 mb-4">
					            		<label for="schedule" class="form-label">{{ __('Send Email')}} <sup class="text-danger">*</sup></label>
										<div>
											<div class="form-check form-check-inline">
												<input {{old("schedule") ==  '1'? "checked" :""}} class="form-check-input" type="radio" name="schedule" id="schedule" value="1" checked="">
												<label class="form-check-label" for="schedule">{{ __('Now')}}</label>
											</div>

											<div class="form-check form-check-inline">
												<input  {{old("schedule") ==  '2'? "checked" :""}} class="form-check-input" type="radio" name="schedule" id="schedule2" value="2">
												<label class="form-check-label" for="schedule2">{{ __('Later')}}</label>
											</div>
										</div>
					          		</div>
					          		<div class="col-md-6 scheduledate"></div>
				          		</div>
				          	</div>
				        </div>

					    <button type="submit" class="btn btn-primary me-sm-3 me-1">
							{{__("Submit")}}
						</button>
				    </form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


@push('scriptpush')
<script>
	(function($){
		"use strict";
		{{--selectSearch("{{route('admin.email.select2')}}")--}}
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
                const __ =  "{{ __('Schedule Date & Time') }}"
	        	var html = `
	        		<label for="shedule_date" class="form-label">${__}<sup class="text-danger">*</sup></label>
					<input type="datetime-local" value= "{{old("shedule_date")}}" name="shedule_date" id="shedule_date" class="form-control" required="">`;
	        	$('.scheduledate').append(html);
	        }else{
	        	$('.scheduledate').empty();
	        }
	    });


		$(document).ready(function() {
	        // $('#message').summernote({
		    //     placeholder: '{{ __('Write Here Email Content &  For Mention Name Use ')}}'+'{'+'{name}'+"}",
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
@endpush

