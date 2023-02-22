
@php 

$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_fr = App\Models\Product::groupBy('product_tags_fr')->select('product_tags_fr')->get();

@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 
        @if(session()->get('language') == 'french') 
          @foreach($tags_fr as $tag)
            <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_fr) }}">
              {{ str_replace(',',' ',$tag->product_tags_fr)  }}</a> 
          @endforeach
        @else 
            @foreach($tags_en as $tag)
            <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
              {{ str_replace(',',' ',$tag->product_tags_en)  }}</a> 
            @endforeach
        @endif

        <a class="item" title="Toys" href="category.html">Toys</a> 
        <a class="item" title="Rose" href="category.html">Rose</a> 
      </div>
      <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>