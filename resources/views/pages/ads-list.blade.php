<ul class="list">
  @if ($ads->count() == 0)
     <h3>No Ads Found.</h3>
@else

  @foreach ($ads as $ad)
    <a href="{{ route('ad.single', ['catid' => $ad->cat_id, 'scatid' => $ad->scat_id, 'id' => $ad->id])}}">
      <li>
        <img src="../../../images/ads/{{ $ad->ad_img}}" title="" alt="" />

        <section class="list-left">
          <h5 class="title">{{ $ad->ad_sdesc}}</h5>
          <span class="adprice">¢{{$ad->ad_cost}}</span>
          <p class="catpath">{{$cat_info->name}} » {{$sub_info->name}} & {{$ad->ad_sdesc}}</p>
        </section>

        <section class="list-right">
          <span class="date">{{date('h:ia', strtotime($ad->created_at))}}</span>
          <span class="cityname">{{ $ad->ad_location}}</span>
        </section>

        <div class="clearfix"></div>
      </li>
    </a>
  @endforeach
    @endif
</ul>
