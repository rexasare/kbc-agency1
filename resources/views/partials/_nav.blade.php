<!-- Navigation -->
<div class="agiletopbar">
  <div class="wthreenavigation">
    <div class="menu-wrap">
    <nav class="menu">
      <div class="icon-list">
        @foreach ($cats as $cat)
          <a href="{{ route('all.ads', ['catid' => $cat->id]) }}"><i class="fa fa-fw fa-{{$cat->class}}"></i><span>{{$cat->name}}</span></a>
      @endforeach
      </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
  </div>
  <button class="menu-button" id="open-button"> </button>
  </div>
  <div class="clearfix"></div>
</div>
<!-- //Navigation -->
