<div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              @foreach($categories as $category)
                @if ($category->status == "1")
                  <li class="main-nav-list"><a data-toggle="collapse" href="#{{ $category->url }}-{{ $category->id }}" aria-expanded="false" aria-controls="{{ $category->url }}-{{ $category->id }}"><span
                     class="lnr lnr-arrow-right"></span>{{ $category->name }}<span class="number">(53)</span></a>
                    <ul class="collapse" id="{{ $category->url }}-{{ $category->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $category->url }}-{{ $category->id }}">
                      @foreach($category->categories as $sub_category)
                        @if ($sub_category->status == "1")
                          <li class="main-nav-list child"><a href="{{ url('/products/'. $sub_category->url) }}">{{ $sub_category->name }}<span class="number">(13)</span></a></li>
                        @endif
                      @endforeach
                    </ul>
                  </li>
                @endif
              @endforeach
            </ul>
</div>
<div class="sidebar-filter">
  <div class="top-filter-head">Product Filters</div>
  <div class="common-filter">
    <div class="head">Brands</div>
    <form action="#">
      <ul>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
      </ul>
    </form>
  </div>
  <div class="common-filter">
    <div class="head">Color</div>
    <form action="#">
      <ul>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
            Leather<span>(29)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
            with red<span>(19)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
        <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
      </ul>
    </form>
  </div>
  <div class="common-filter">
    <div class="head">Price</div>
    <div class="price-range-area">
      <div id="price-range"></div>
      <div class="value-wrapper d-flex">
        <div class="price">Price:</div>
        <span>$</span>
        <div id="lower-value"></div>
        <div class="to">to</div>
        <span>$</span>
        <div id="upper-value"></div>
      </div>
    </div>
  </div>
</div>