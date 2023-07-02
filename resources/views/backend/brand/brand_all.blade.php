@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Brand</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href=" {{route('add.brand')}} " class="btn btn-primary">Add Brand</a>         
            </div>
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
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                       @foreach($brands as $key => $item)
                        <tr>
                            <th> {{$key+1}} </th>
                            <th> {{$item->brand_name}} </th>
                            <th>  <img src=" {{asset($item->brand_image)}} " alt="Brand" style="height:50px; width:70px"></th>
                            <td>
                                <a href=" {{route('brand.edit', $item->id)}} " class="btn btn-info">Edit</a>
                                <a href=" {{route('brand.delete', $item->id)}} " id="delete" class="btn btn-danger">Delete</a>
                            </td>                            
                        </tr>
                        @endforeach
                    </tfoot>
                     <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
   
</div>

@endsection