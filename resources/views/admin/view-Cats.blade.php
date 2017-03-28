@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
     <div class="grids">
         <div class="progressbar-heading grids-heading">
             <h2>View Categories</h2>
         </div>
          <table class="table table-condensed">
             <thead>
               <th>#</th>
               <th>Category Name</th>
               <th>Category Class</th>
               <th>Action</th>
             </thead>

             <tbody>
                 @foreach ($cats as $cat)
                    <tr>
                      <td>{{$cat->id}}</td>
                      <td>{{$cat->name}}</td>
                      <td>{{$cat->class}}</td>
                      <td>
                        <button type="button" class="btn btn-default btn-md">
                          <a href="{{route('cat.edit', ['id' => $cat->id])}}">Edit</a>
                        </button>
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
