@extends('layouts.main')

@section('content')
<!--content -->
<div class="content">
            <div class="animated fadeIn">


                <div class="row">
                 

                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header"><strong>Tasks</strong><small> Form</small></div>
                            <div class="card-body card-block">
                                <form action="{{ route('editTask') }}" method="post">
                                 {{ csrf_field() }}
                  
                               @foreach ($task as $task)
                                   
                               <input type="hidden" name='id' value="{{ $task->id }}">
                                <div class="form-group"><label for="title" class=" form-control-label">Title</label><input type="text" id="company"  name="title" placeholder="Enter task title" class="form-control" value="{{ $task->title }}"></div>
                                <div class="form-group"><label for="discription" class=" form-control-label">Description</label><input type="text" id="vat" name="discription" placeholder="Enter description for task" class="form-control" value="{{ $task->discription }}"></div>

                                  <div class="form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Status</label></div>
                                        <div class="col-12 col-md-9">
                                            <select  id="select" class="form-control" name="status">
                                               @if ($task->status =='In Progress')
                                               <option value="In Progress" selected>In progress</option>
                                               <option value="Completed" >Completed</option>
                                               @else
                                               <option value="Completed" selected>Completed</option>
                                               <option value="In Progress" >In progress</option>

                                               @endif                                                                                            
                                              
                                            </select>
                                        </div>
                                    </div>

                               
                
                                <div class="form-group"><label for="progress" class=" form-control-label">Progress</label><input type="number" id="progress" name="progress" placeholder="Progress %" class="form-control" value="{{ $task->progress }}"></div>

                                  <div class="form-group">
                                      <button class="btn btn-primary" type="submit" value="submit">Update</button>
                                  </div>
                                  @endforeach
                                </form>

                             
                            </div>
                        </div>
                    </div>

                


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>



@endsection