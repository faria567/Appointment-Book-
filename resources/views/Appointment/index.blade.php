@extends('include.master')
@section('content')
@section('title','Appointment')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div class="row" style="margin: 0px -2px">
      <div class="bg-white py-3 rounded" style="border: 1px solid lightgray" >
        <div class="align-self-center" style="color: black">
          <h4 class="header-title">Appointment </h4>
        </div>
        <div id="dashbord-border"></div>
      </div>
    </div>

    <div class="row" style="margin: 0px -2px">
      <div class="search-option rounded bg-white" style="border: 1px solid lightgray; border-top: none" >
        <form action="" method="get" class="row text-start pt-4">
          <div class="col-md-8">
              <div class="row">
                  <div class="form-group col-md-3 ms-md-4">
                      <input type="text" class="form-control" name="title" placeholder="title" />
                  </div> 
                  <div class=" col-md-3">
                      <button type="submit" class="search-btn btn btn-info" ><i class="fa fa-search"></i> SEARCH </button>
                  </div>
              </div>
          </div>
          <div class=" col-md-4 text-start text-md-end" >
            <a class="btn btn-success my-3 my-md-0 me-2 "  href="{{route('appointment.create')}}"><i class="fa fa-plus"></i> Add new</a>
            {{-- <a class="btn btn-danger my-3 my-md-0 me-md-3 me-lg-5" href="{{ route('service.index') }}"><i class="fas fa-sync-alt"></i> Refresh</a> --}}
          </div>
        </form>
      </div>
    </div>







<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">start time</th>
                                    <th scope="col">finish time</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Comments</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($appointment as $item)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td >{{$item->start_time}}</td>
                                    <td >{{$item->finish_time}}</td>
                                    <td >{{$item->price}}</td>
                                    <td >{{$item->comments}}</td>
                                    <td ><img style="width:150px; height:100px;" src="{{ asset('uploads/'.$item->image)}}" alt=""></td>
                                  
                                        <td>
                                            <form action="{{route('appointment.destroy',$item->id)}}"  method="Post">
                                           
                                            <a href="{{route('appointment.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                 
                </div>
            </div>
        </div>

    </div>
</div>


@endsection