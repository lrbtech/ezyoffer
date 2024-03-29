@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
@endsection
@section('section')        
        <!-- Right sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>{{$language[35][Auth::guard('admin')->user()->lang]}}</h2> 
                  <h6 class="mb-0">{{$language[0][Auth::guard('admin')->user()->lang]}}</h6>
                </div>
                <!-- <div class="col-lg-6 breadcrumb-right">     
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Basic Init</li>
                  </ol>
                </div> -->
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="datatable">
                        <thead>
                          <tr>
                            <th>{{$language[36][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[37][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[38][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[39][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[40][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[41][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[42][Auth::guard('admin')->user()->lang]}}</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Zero Configuration  Ends-->


            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>



@endsection
@section('extra-js')
  <script src="/assets/app-assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/app-assets/js/datatable/datatables/datatable.custom.js"></script>
  <script src="/assets/app-assets/js/chat-menu.js"></script>

<script type="text/javascript">
$('.all-customer').addClass('active');

var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

var orderPageTable = $('#datatable').DataTable({
    "processing": true,
    "serverSide": true,
    //"pageLength": 50,
    "ajax":{
        "url": "/admin/get-all-customer",
        "dataType": "json",
        "type": "POST",
        "data":{ _token: "{{csrf_token()}}"}
    },
    "columns": [
        //{ data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'date', name: 'date'},
        { data: 'name', name: 'name'},
        { data: 'account_type', name: 'account_type'},
        { data: 'mobile', name: 'mobile' },
        { data: 'email', name: 'email' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action' },
    ]
});

function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-customer/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          // location.reload();
          var new_url = '/admin/get-all-customer';
          orderPageTable.ajax.url(new_url).load(null, false);
        }
      });
    } 
}
</script>
@endsection