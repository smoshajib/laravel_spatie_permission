@extends('backend.layouts.master')


@section('title')
Create Roles Page | Admin Panel
@endsection

@section('style')
    
@endsection

@section('admin-content')
  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Roles</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li><span>All Roles</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        @include('backend.layouts.partials.logout')
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Create New Role</h4>
                                <form action="{{route('admin.roles.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name">
                                       
                                       
                                       @error('name')
                                       <!--  -->
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Permission</label>
                                        <div class="row">
                                           
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input type="checkbox"  class="form-check-input" id="checkPermissionAll" value="1" >
                                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <!-- <label for="exampleInputEmail1">Permission</label> -->
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="permissions[]" class="form-check-input" id="checkPermission{{$permission->id}}" value="{{$permission->name}}">
                                                    <label class="form-check-label" for="checkPermission{{$permission->id}}">{{$permission->name}}/{{$permission->id}}</label>
                                                </div>
                                            </div>
                                           @endforeach
                                        </div>
                                       
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>

            </div>
@endsection


@section('script')
<script type="text/javascript">
    $("#checkPermissionAll").click(function(){
          if($(this).is(':checked')){
              $('input[type=checkbox]').prop('checked',true);
          }else{
            $('input[type=checkbox]').prop('checked',false);
          }
    });
</script>
@endsection