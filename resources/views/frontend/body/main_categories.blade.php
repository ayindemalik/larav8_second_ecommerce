<section class="mb-lg-10 mt-lg-14 my-8">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-6">
        <h3 class="mb-0">Main Categories</h3>
      </div>
    </div>
    <div class="category-slider ">
      @foreach($categories as $key => $category)
          <!-- nav item -->
          <div class="item"> 
            @if(session()->get('language') == 'french') 
              @php $name_slug_fr = strtolower(str_replace(' ', '-', $category->category_name_fr)) @endphp
              <a href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_fr]) }}"
                class="text-decoration-none text-inherit">
                <div class="card card-product mb-lg-4">
                  <div class="card-body text-center py-8" title="{{ $category->category_name_fr }}">
                    <img src="{{ asset($category->category_image) }}" width="120" height="120">
                    <div class="text-truncate card_text">{{ $category->category_name_fr }} </div>
                  </div>
                </div>
              </a>
            @else 
              @php $name_slug_en = strtolower(str_replace(' ', '-', $category->category_name_en)) @endphp
              <a href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_en]) }}"
                class="text-decoration-none text-inherit">
                <div class="card card-product mb-lg-4">
                  <div class="card-body text-center py-8" title="{{ $category->category_name_en }}">
                    <img src="{{ asset($category->category_image) }}" width="120" height="120">
                    <div class="text-truncate card_text"> {{ $category->category_name_en }} </div>
                  </div>
                </div>
              </a>
            @endif
          </div>
      @endforeach
      </div>
  </div>
</section>