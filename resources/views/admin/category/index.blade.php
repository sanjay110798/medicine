@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-right mb-2">
          <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add </a>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('admin.category.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="form-group">Category Name <sup>*</sup></label>
                      <input type="text" class="form-control" name="category_name" required>
                    </div>
                    <div class="col-md-12">
                      <label class="form-group">Parent Category</label>
                      <select class="form-control" name="parent_id">
                        <option value="">Select</option>
                        @foreach($parentCat as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-12">
                      <label class="form-group">Category Image</label>
                      <input type="file" class="form-control" name="img" >
                    </div>
                    <div class="col-md-12">
                      <label class="form-group">Category Description</label>
                      <textarea class="form-control" name="description" rows='4'></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  ?>
                  @foreach($category as $cat)
                  <?php
                  $i++;
                  ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$cat->name}}
                      <?php
                      if($cat->parent_id!='0'){
                        $Parent=App\Model\Category::where(['id'=>$cat->parent_id])->first();
                        if($Parent){
                          echo "<span>(".$Parent->name.")</span>";
                        }

                      }?>

                    </td>
                    <td><img src="{{asset('upload/category/'.$cat->img)}}" alt="img" style="width:40px;height:50px"></td>
                    <td>{{$cat->description}}</td>

                    <td>
                      <a href="#"> 
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$cat->id}}"><i class="fa fa-pencil"></i></button>
                      </a>
                      <!-- ////// -->
                      <div class="modal fade" id="editModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('admin.category.edit',['id'=>$cat->id])}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="form-group">Category Name <sup>*</sup></label>
                                    <input type="text" class="form-control" name="category_name" value="{{$cat->name}}" required>
                                  </div>
                                  <div class="col-md-12">
                                    <label class="form-group">Parent Category</label>
                                    <select class="form-control" name="parent_id">
                                      <option value="">Select</option>
                                      @foreach($parentCat as $val)
                                      <option value="{{$val->id}}" {{($val->id==$cat->parent_id) ? 'selected' : ''}} {{($val->id==$cat->id) ? 'disabled' : ''}} >{{$val->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                    <label class="form-group">Category Image</label>
                                    <input type="file" class="form-control" name="img" >
                                  </div>
                                  <div class="col-md-12">
                                    <label class="form-group">Category Description</label>
                                    <textarea class="form-control" name="description" rows='4'>{{($cat->description!='') ? $cat->description : ''}}</textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- ////// -->
                      <a href="{{route('admin.category.del',$cat->id)}}" onclick ="return confirm('Are you sure to delete !')"> 
                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>


                      </td>
                      @endforeach
                    </tr>

                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
            </div>
            <div class="card-footer clearfix">
             {{ $category->links() }}
           </div>
           <!-- /.card -->


           <!-- /.card -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 @endsection