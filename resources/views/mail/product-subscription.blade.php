<p>Hi, {{$subscriber->name }} the following products were just added...</p>


<ul>
    @foreach ($products as $product)
        <li>{{ $product['title'] }}</li>
    @endforeach
</ul>