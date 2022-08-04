@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscriber List</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscriber List
              <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#addnewmodal">All Delete</a>
          </h6>
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Subscribing Time</th>
                  <th class="wd-20p">Action</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($sub as $key=>$row)
                  <tr>
                    <td><input type="checkbox"> {{$key +1}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffforhumans()}}</td>
                    <td>
                        <a href="{{URL::to('delete/sub/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
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

            <form action="{{route('store.category')}}" method="POST">
             @csrf

              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" name="category_name" placeholder="Category"> 
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