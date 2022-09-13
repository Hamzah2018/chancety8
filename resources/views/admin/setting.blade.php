@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css'" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">بوست</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المتاحه</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
				<div class="row">
	<!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">

                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary rounded-pill" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">إضافة بوست</a>
                    </div>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive-lg"  style="overflow-x:auto;">
                    <table class="table text-md-nowrap" id="example2">
                        <thead >
                            <tr>
                                <th class="wd-15p border-bottom-0">رقم </th>
                                <th class="wd-15p border-bottom-0"> رقم الوظيه المباشره</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                            <tr id={{$setting->id}}>
                                <td>{{ $setting->id }}</td>
                                <td> {{ $setting->direct_post }}</td>
                                    {{-- <a href="{{route('setting.edit', $setting->id )}}" class ="modal-effect btn btn-outline-success rounded-pill">Edit</a> --}}
                                    {{-- <a href="" class ="modal-effect btn btn-outline-danger rounded-pill">delete</a> --}}
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                    data-id="{{$setting->id}}"
                                    data-direct_post="{{ $setting->direct_post}}"
                                    data-toggle="modal" href="#exampleModal2"
                                    title="تعديل"><i class="las la-pen"></i></a>
                                     <button class="btn btn-outline-danger btn-sm"
                                                 data-id="{{$setting->id}}"
                                                data-direct_post="{{ $setting->direct_post }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                                {{-- <a href="{{route('setting.show',$setting->id)}}" class="btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a> --}}
                                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->
		<!-- Basic modal -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                    <div class="card  box-shadow-0">
					<div class="modal-header">
                        {{-- <div class="card-header"> --}}
                            {{-- <h4 class="card-title mb-1">Default Form</h4> --}}
                            {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                        {{-- </div> --}}
						<h6 class="modal-title">إضافة بوست
                            </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
							<div class="card-body pt-0">


                                <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    {{-- {{ csrf_feild()}} --}}
                                    @csrf
                                    <div class="form-group">
                                    {{-- <p class="mg-b-10">نوع الشقه</p> --}}
                                    <div class="form-group">
										<input type="number" class="form-control" id="inputName" name="direct_post" placeholder="وظيفه مباشره">
									</div>
                                    {{-- <div class="form-group">
										<input type="text" class="form-control" id="inputName" name="" placeholder="Name">
									</div> --}}
							</div>
						</div>
					</div>
					<div class="modal-footer">
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary rounded">حفظ</button>
                                {{-- <button type="submit" class="btn btn-secondary">إلغاء</button> --}}
                            </div>
                        </div>

					</div>
				</div>
			</div>
        </form>
		</div>
		<!-- End Basic modal -->

				</div>
				<!-- row closed -->

			</div>
  <!-- edit -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">

             <form action="setting/update" method="post" autocomplete="off">
                 {{method_field('patch')}}
                 {{csrf_field()}}
                 <div class="form-group">
                     <input type="hidden" name="id"  id="id">
                       <input type="number" class="form-control" name="direct_post" id="direct_post">
                 </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
 </div>
			<!-- Container closed -->

		</div>
          <!-- delete -->
          <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الحقل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                       type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="setting/destroy" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحقل ؟</p><br>
                            <input type="hidden" name="id" id="id" value="id">

                            <input type="text" class="form-control" name="direct_post" id="direct_post" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>



		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var direct_post = button.data('direct_post')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #direct_post').val(direct_post);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var direct_post = button.data('direct_post')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #direct_post').val(direct_post);
    })
</script>
@push('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#example2').DataTable();
       } );
    </script>
@endpush

@endsection

