@extends('layouts.simple.master')
@section('title', 'DATA Source DataTables')

@section('css')
    
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('breadcrumb-title')
    {{-- <h3>DATA Source DataTables</h3> --}}
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item"></li>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- HTML (DOM) sourced data  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3 class="mb-3">Stocks</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="data-source-1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Pictire</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0;@endphp
                                @foreach($stocks as $stock)
                                
                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        {{$stock->code}}
                                    </td>
                                    <td>
                                        {{$stock->descrip}}
                                    </td>
                                    <td>
                                        {{$stock->picture}}
                                    </td>
                                    <td>
                                        {{$stock->status}}
                                    </td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                            </li>
                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                                    {{-- <tr>
                                        <td>Donna Snider</td>
                                        <td>Customer Support</td>
                                        <td>$112,000</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>d.snider@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr> --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Picture</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
