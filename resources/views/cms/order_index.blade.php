@extends('cms.cms_master')
@section('main_content')
<div class="app-content content mb-200">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    @component('components.mini_nav_cms', [
                        'title' => 'Order',
                        'items' => [
                            'Orders' => 'orders',
                            'Order' => '',
                        ]
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($order)
            <h2 class="content-header-title float-left mb-1">Detalis:</h2>
            <section id="data-list-view" class="data-list-view-header">
                    <div class="table-responsive">
                        <table class="table data-list-view table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Order id</th>
                                    <th class="text-center">User name</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">
                                    @if ($order->name)
                                    {{ $order->name }}
                                @else
                                <b class="text-danger">User deleted</b>
                                @endif
                                </td>
                                <td class="text-center">${{ $order->total }}</td>
                                <td class="text-center">{{ collect(unserialize($order->data))->sum('quantity') }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($order->created_at)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        </table>
                    </div>
            </section>
            <h2 class="content-header-title float-left mb-1">Products:</h2>
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Product id</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (unserialize($order->data) as $product)
                                <tr>
                                <td class="text-center">{{ $product['id'] }}</td>
                                <td class="text-center">
                                    <a href="{{ url($product['attributes']['url']) }}" target="_blank">
                                        @if ($product['attributes']['image'] != 'no-image.jpg')
                                        <img width="100" src="{{ asset('images/products/' . $product['attributes']['image']) }}" alt="product image">
                                        @else
                                        <img width="100" src="{{ asset('images/' . $product['attributes']['image']) }}" alt="product image">
                                        @endif
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url($product['attributes']['url']) }}" class="site-color" target="_blank">
                                    {{ $product['name'] }}
                                    </a>
                                </td>
                                <td class="text-center">${{ $product['price'] }}</td>
                                <td class="text-center">{{ $product['quantity'] }}</td>
                                <td class="text-center">${{ $product['price'] * $product['quantity'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </table>
                </div>
        </section>
            @else
            <div class="row">
                <div class="col-12">
                    <div class="form-group mt-3">
                    <h1 class="text-center">There are no Order...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection