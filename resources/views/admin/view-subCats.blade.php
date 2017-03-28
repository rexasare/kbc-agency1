@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
     <div class="grids">
         <div class="progressbar-heading grids-heading">
             <h2>View Sub-Categories</h2>
         </div>
          <table class="table table-condensed">
             <thead>
               <th>#</th>
               <th>Category Name</th>
               <th>Sub-Category Name</th>
               <th>Action</th>
             </thead>

             <tbody>
                 @foreach ($scats as $scat)
                    <tr>
                      <td>{{$scat->id}}</td>
                      <td>{{$cat_name[$scat->id]->name}}</td>
                      <td>{{$scat->name}}</td>
                      <td>
                        <button type="button" class="btn btn-default btn-md">
                          <a href="{{route('scat.edit', ['id' => $scat->id])}}">Edit</a>
                        </button>
                        <form  action="{{route('scat.destroy', ['id' => $scat->id])}}" method="post" style="display: inline;">
                          {{ csrf_field() }}
                           <button type="submit" class="btn btn-danger btn-md">Delete</button>
                        </form>
                      </td>
                    </tr>
                 @endforeach
             </tbody>
          </table>
    </div>


 <!-- end content -->
<div class="footer">
     <div class="clearfix"> </div>
    <p>© 2016 Gretong. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div>



@endsection
