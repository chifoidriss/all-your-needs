
<div class="product-item 
    @foreach ($product->categories as $item)
    {{ $item->superCategory->collection->slug }}
    @endforeach">
    <div class="product discount product_filter">
        <div class="product_image">
            <img src="{{ asset('storage/'.$product->image) }}">
        </div>

        <div class="favorite favorite_left"></div>
        
        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
            <span>{{ $product->rate }}</span>
        </div>
        
        <div class="product_info">
            <h6 class="product_name">
                <a href="{{ route('product.show', [Str::slug($product->name), $product->id]) }}">
                    {{ $product->name }}
                </a>
            </h6>
            <div class="product_price">
                {{ getPrice($product->price) }}
                <span>{{ getPrice($product->old_price) }}</span>
            </div>
        </div>
    </div>
    
    <div class="red_button add_to_cart_button">
        <a href="{{ route('product.show', [Str::slug($product->name), $product->id]) }}">
            @awt('show')
        </a>
    </div>
</div>