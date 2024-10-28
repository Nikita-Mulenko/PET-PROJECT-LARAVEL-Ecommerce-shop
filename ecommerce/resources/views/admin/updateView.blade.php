<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    @include('admin.css')

    <style type="text/css">
        .title
        {
            color:white; 
            padding-top:25px; 
            font-size:25px
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>

  </head>
  <body>
      <!-- partial -->
      @include('admin.sidebar')

      @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <h1 class="title">Update Product</h1>
                
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert" style="float:right">x</button>
                        {{session()->get('message')}}

                        <!--
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;
                              
                            </span>
                          </button>
                        -->
                    </div>

                @endif
                
                <form action="{{url('updateProduct',$data->id)}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div style="padding:15px">
                        <label for="">Product title</label>
                        <input style="color:black" type="text" name="title" value="{{$data->title}}" required="">
                    </div>
                    <div style="padding:15px">
                        <label for="">Price</label>
                        <input style="color:black" type="number" name="price" value="{{$data->price}}" required="">
                    </div>
                    <div style="padding:15px">
                        <label for="">Description</label>
                        <input style="color:black" type="text" name="des" value="{{$data->description}}" required="">
                    </div>
                    <div style="padding:15px">
                        <label for="">Quantity</label>
                        <input style="color:black" type="text" name="quantity" value="{{$data->quantity}}" required="">
                    </div>
                    <div style="padding:15px">
                        <label for="">Old Image</label>
                        <img height="100" width="100" src="/productImage/{{$data->image}}">
                    </div>
                    <div style="padding:15px">
                        <label for="">Change the Image</label>
                        <input style="color:rgb(255, 255, 255)" type="file" name="file">
                    </div>
                    <div style="padding:15px">
                        <input style="color:black" class="btn btn-success" type="submit">
                    </div>
                </form>

            </div>
        </div>  

        <!-- partial -->
      @include('admin.script')
  </body>
</html>