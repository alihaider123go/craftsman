
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['service.destroy', $data->id], 'method' => 'delete','data--submit'=>'service'.$data->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(auth()->user()->hasAnyRole(['handyman']) && !$data->trashed())
   
        <a class="btn btn-primary" href="{{ route('service.destroy', $data->id) }}" data--submit="service{{$data->id}}" 
            data--confirmation='true' 
            data--ajax="true"
            data-datatable="reload"
            data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.service') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.service') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            Send Request
            <!-- <i class="far fa-trash-alt text-danger"></i> -->
        </a>

    @endif
</div>
{{ Form::close() }}