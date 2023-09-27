@extends('include.master')
@section('content')
@section('title','Appointment')


    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('appointment.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h4 class="header-title">Appointment</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Appointment</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Amount</label>
                    <input class="form-control" type="text" name="amount" value="{{old('amount')}}" id="example-text-input">

                    @error('amount')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <input class="form-control" type="text" name="description" value="{{old('description')}}" id="example-text-input">

                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"> Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                  

                   

                

                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<!-- main content area end -->

@endsection
