@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
     <div class="grids">
         <div class="progressbar-heading grids-heading">
             <h2>View Banners</h2>
         </div>
         <div class="row forms-panel">
           @foreach ($banners as $banner)
             <div class="col-md-6">
                 <div class="panel panel-default">
                      <div class="panel-heading">
                            <h3 class="panel-title">{{$banner->mg_title}}-Banner {{$banner->id}}</h3>
                      </div>
                      <div class="panel-body">
                        <img src="../../images/banners/{{$banner->img_file}}" alt="" style="width:493px; height:250px;">
                        <p>{{$banner->img_desc}}</p>
                        <button type="button" name="button" class="btn btn-default">
                          <a href="{{ route('banner.show', ['id' => $banner->id])}}">Edit</a>
                        </button>
                        <form action="{{route('banner.destroy', ['id' => $banner->id])}}" method="post" style="display:inline;">
                            {{ csrf_field() }}
                          <button type="submit" name="button" class="btn btn-danger">Delete</button>
                        </form>

                      </div>
                  </div>
               </div>
            @endforeach
         </div>
         {!! $banners->links()!!}
    </div>


 <!-- end content -->
<div class="footer">
     <div class="clearfix"> </div>
    <p>© 2016 Gretong. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div>



@endsection
