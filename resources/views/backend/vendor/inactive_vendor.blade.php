@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Inactive Vendor</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Inactive Vendor</li>
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Brand</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Shop Name</th>
                            <th>vendor Username</th>
                            <th>Join Date</th>
                            <th>Vendor Email</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($inactiveVendor as $key=>$items)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->username}}</td>
                            <td>{{$items->vendor_join}}</td>
                            <td>{{$items->email}}</td>
                            <td><span class="btn btn-secondary">{{$items->status}}</span> </td>
                            <td>
                                <a href="{{route('inactive.vendor.details', $items->id)}}" class="btn btn-info">Vendor Deatails</a>
                            </td>                            
                        </tr>
                        @endforeach
                    </tfoot>
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Shop Name</th>
                            <th>vendor Username</th>
                            <th>Join Date</th>
                            <th>Vendor Email</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
   
</div>


@endsection