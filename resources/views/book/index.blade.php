


  <div class="">
      <div class="" style="
      display:flex;
      flex-direction:column;
      justify-content:center; 
      align-items:center
      ">
      <form class="form-valide" action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')

          <h4 class="header-title text-danger" style="text-align: center">Service book</h4>
<div class="">

  <div class="form-group" style="
  display:flex;
  flex-direction:column;
  justify-content:center; 
  align-items:center
  ">
        <label for="example-text-input" class="col-form-label"> Name</label>
        <input class="form-control" type="text" name="name"value="{{old('name')}}" id="example-text-input">

        @error('name')
            <p class="text-danger">{{$message}}</p>
            
        @enderror

        <label for="example-text-input" class="col-form-label">Email</label>
        <input class="form-control" type="email" name="email"value="{{old('email')}}" id="example-text-input">

        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <label for="example-text-input" class="col-form-label">Start Date</label>
        <input class="form-control" type="date" name="start_date"value="{{old('start_date')}}" id="example-text-input">
        @error('start_date')
            <p class="text-danger">{{$message}}</p>
        @enderror
       

        <label for="example-text-input" class="col-form-label">End Date</label>
        <input class="form-control" type="date" name="finish_date"value="{{old('finish_date')}}" id="example-text-input">
        @error('finish_date')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <label for="example-text-input" class="col-form-label">Start Time</label>
        <input class="form-control" type="time" step="1" name="start_time"value="{{old('start_time')}}" id="example-text-input">
        @error('start_time')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <label for="example-text-input" class="col-form-label">Finish Time</label>
        <input class="form-control" type="time" step="1" name="finish_time"value="{{old('finish_time')}}" id="example-text-input">
        @error('finish_time')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <label for="example-text-input" class="col-form-label">Mobile</label>
        <input class="form-control" type="text" name="mobile"value="{{old('mobile')}}" id="example-text-input">

        @error('mobile')
            <p class="text-danger">{{$message}}</p>
        @enderror
    


</div>
</div>

          <button class="btn btn-primary" style="margin-top:10px" type="submit">Submit</button>
          </form>
      </div>
  </div>


<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
      console.error( error );
  } );
</script>


