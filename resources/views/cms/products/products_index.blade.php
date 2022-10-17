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
                        'title' => 'Products',
                        'items' => [
                            'Products' => '',
                        ]
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    @component('components.add_item_in_cms')
                    @slot('url') cms/products/create @endslot
                    @slot('title') Product @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($products->count())
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Url</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Visibility</th>
                                <th class="text-center">Is open</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td class="text-center">
                                    <a href="{{ url('shop/' . $product->url . '/' . $product->purl) }}" target="_blank">
                                        @if ($product->pimage != 'no-image.jpg')
                                        <img width="100" src="{{ asset('images/products/' . $product->pimage) }}" alt="product image">
                                        @else
                                        <img width="100" src="{{ asset('images/' . $product->pimage) }}" alt="product image">
                                        @endif
                                    </a>
                                </td>
                                <td class="text-center">{{ $product->title }}</td>
                                <td class="text-center">{{ $product->ptitle }}</td>
                                <td class="text-center">
                                    <a href="{{ url('shop/' . $product->url . '/' . $product->purl) }}" target="_blank" class="site-color">
                                        {{ $product->purl }}
                                    </a>
                                </td>
                                <td class="text-center">${{ $product->price }}</td>
                                <td class="text-center">{{ $product->visibility ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ $product->is_open ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($product->updated_at)) }}</td>
                                <td class="text-center">
                                <a href="{{ url('cms/products/' . $product->id . '/edit' . '?back_to_page=' . $paginate_data['current_page']) }}" class="site-color">
                                        <i class="users-edit-icon feather icon-edit-1 mr-50"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('cms/products/' . $product->id . '?back_to_page=' . $paginate_data['current_page']) }}" class="text-danger">
                                        <i class="users-delete-icon feather icon-trash-2"></i>
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </table>
                </div>
            </section>
            <div class="row mt-2">
                <div class="col-12 col-sm-6">
                    @component('components.paginate', ['paginate' => $paginate_data])
                    @endcomponent
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-right">
                    @component('components.items_data_paginate', ['paginate' => $paginate_data])
                    @endcomponent
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12">
                    <div class="form-group mt-3">
                    <h1 class="text-center">There are no products...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection