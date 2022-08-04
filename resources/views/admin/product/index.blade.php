@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
              <a href="{{route('add.product')}}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
          </h6>
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-15p">Brand</th>
                  <th class="wd-15p">Quantity</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Action</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $row)
                  <tr>
                    <td>{{$row->product_code}}</td> 
                    <td>{{$row->product_name}}</td>
                    <td><img src="{{URL::to($row->image_one)}}" height="50px;" width="50px" alt=""></td>
                    <td>{{$row->category_name}}</td>
                    <td>{{$row->brand_name}}</td>
                    <td>{{$row->product_quantity}}</td>
                    <td>
                         @if ($row->status == 1)
                             <span class="badge badge-success">Active</span>
                         @else
                             <span class="badge badge-danger">Inactive</span>
                         @endif

                    </td>

                    <td>
                        <a href="{{URL::to('edit/product/'.$row->id)}}" class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>
                        <a href="{{URL::to('delete/product/'.$row->id)}}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"></i></a>
                        <a href="{{URL::to('view/product/'.$row->id)}}" class="btn btn-sm btn-warning" title="show"><i class="fa fa-eye"></i></a>

                        @if ($row->status == 1)
                             <a href="{{URL::to('inactive/product/'.$row->id)}}" class="btn btn-sm btn-danger" title="inactive"><i class="fa fa-thumbs-down"></i></a>
                        @else
                             <a href="{{URL::to('active/product/'.$row->id)}}" class="btn btn-sm btn-info" title="active"><i class="fa fa-thumbs-up"></i></a>
                        @endif
                       
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      </div><!-- sl-pagebody -->
     
    </div><!-- sl-mainpanel -->


   <!-- LARGE MODAL -->
        <div id="addnewmodal" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
             @csrf

              <div class="form-group">
                <label for="exampleInputEmail1">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" placeholder="Brand"> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Brand Logo</label>
                <input type="file" class="form-control" name="brand_logo" placeholder="Brand Logo"> 
              </div>

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


@endsection