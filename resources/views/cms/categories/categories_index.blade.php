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
                        'title' => 'Categories',
                        'items' => [
                            'Categories' => '',
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
                    @slot('url') cms/categories/create @endslot
                    @slot('title') Category @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($categories->count())
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Url</th>
                                <th class="text-center">Visibility</th>
                                <th class="text-center">Is open</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                <td class="text-center">
                                    <a href="{{ url('shop/' . $category->url) }}" target="_blank">
                                    @if ($category->image != 'no-image.jpg')
                                    <img width="100" src="{{ asset('images/categories/' . $category->image) }}" alt="category-image">
                                    @else
                                    <img width="100" src="{{ asset('images/' . $category->image) }}" alt="category-image">
                                    @endif
                                    </a>
                                </td>
                                <td class="text-center">{{ $category->title }}</td>
                                <td class="text-center">
                                    <a href="{{ url('shop/' . $category->url) }}" target="_blank" class="site-color">
                                    {{ $category->url }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $category->visibility ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ $category->is_open ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($category->updated_at)) }}</td>
                                <td class="text-center">
                                <a href="{{ url('cms/categories/' . $category->id . '/edit' . '?back_to_page=' . $paginate_data['current_page']) }}" class="site-color">
                                        <i class="users-edit-icon feather icon-edit-1 mr-50"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('cms/categories/' . $category->id . '?back_to_page=' . $paginate_data['current_page']) }}" class="text-danger">
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
                    <h1 class="text-center">There are no categories...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection