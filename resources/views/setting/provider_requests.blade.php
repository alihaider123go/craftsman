<x-master-layout>
    <div class="container-fluid">
        <div class="card card-block card-stretch">
            <div class="card-body p-0">
                <div class="row ">
                    <div class="col-md-6 d-flex">
                        <div class="user-sidebar">
                            <div class="user-body user-profile text-center mb-0 pb-0">
                                <div class="sideuser-info">
                                    <h4> {{$pageTitle}} </h4>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="user-body user-profile text-center">
                            <div class="input-group ml-2">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control dt-search" id="provider" placeholder="Search..." aria-label="Search" aria-describedby="addon-wrapping" aria-controls="dataTableBuilder">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped border">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
<script>
        // document.addEventListener('DOMContentLoaded', (event) => {
            window.renderedDataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6" p>><"clear">',
                ajax: {
                  "type"   : "GET",
                  "url"    : '{{ route("handyman.provider_list")}}',
                  "data"   : function( d ) {
                    d.search = {
                      value: $('.dt-search').val()
                    };
                    d.filter = {
                        provider: $('#provider').val()
                    }
                  },
                },
                columns: [
                    { data: 'display_name', name: 'display_name', title: "{{__('messages.user')}}", orderable: true, },
                    { data: 'email', name: 'email', title: "{{__('messages.email')}}", orderable: true, },
                    { data: 'contact_number', name: 'contact_number', title: "{{__('messages.contact_number')}}", orderable: true, },
                    // {
                    //     data: 'customer_id',
                    //     name: 'customer_id',
                    //     title: "{{__('messages.user')}}"
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: "{{__('messages.action')}}"
                    }
                    
                ]
                
            });
    //   });


    </script>