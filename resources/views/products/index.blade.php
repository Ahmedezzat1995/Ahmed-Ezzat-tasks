@extends('layouts.parent')

@section('title', 'All Products')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />
@endsection

@section('content')
    <div class="col-12">
        <table class="table" id="example1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($products as $prodct){ 
                    <tr>
                        <th>{{$prodct->id}}</th>
                        <td>{{$prodct->code}}<td>
                        <td>{{$prodct->name_en}} -- {{$prodct->name_ar}}<td>
                        <td>{{$prodct->price}}<td>
                        <td>{{$prodct->quantity}}<td>
                        <td>{{$prodct->status == 1 ? 'active':'not active'}}<td>
                        <td>{{$prodct->updated_at}}<td>
                        <td>{{$prodct->created_at}}<td>
                            <td>
                            <a class="btn btn-outline-warning" href="{{route('products.edit',$prodct->id)}}"> Edit </a>
                           
                            <form action="{{route('products.destroy',$prodct->id)}}" class="d-inline" method="post" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
        });
    </script>
@endsection