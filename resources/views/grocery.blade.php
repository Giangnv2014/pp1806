<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Grocery Store</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      <div class="container">
         <div class="alert alert-success" style="display:none"></div>
         <form id="myForm">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" id="type">
            </div>
            <div class="form-group">
               <label for="price">Price:</label>
               <input type="text" class="form-control" id="price">
             </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
          </form>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
            $('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ url('/grocery/post') }}",
                  method: 'post',
                  data: {
                     name: $('#name').val(),
                     type: $('#type').val(),
                     price: $('#price').val()
                  },
                  success: function(result){
                     $('.alert').show();
                     $('.alert').html(result.success);
                  }});
               });
            });
      </script>
    </body>
</html>