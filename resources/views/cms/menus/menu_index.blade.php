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
                        'title' => 'Menu',
                        'items' => [
                            'Menu' => '',
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
                        @slot('url') cms/menu/create @endslot
                        @slot('title') Menu @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($menus->count())
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">Url</th>
                                <th class="text-center">Visibility</th>
                                <th class="text-center">Is open</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                <td class="text-center">{{ $menu->title }}</td>
                                <td class="text-center">
                                    <a href="{{ url($menu->url) }}" target="_blank" class="site-color">
                                        {{ $menu->link }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $menu->url }}</td>
                                <td class="text-center">{{ $menu->visibility ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ $menu->is_open ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($menu->updated_at)) }}</td>
                                <td class="text-center">
                                <a href="{{ url('cms/menu/' . $menu->id . '/edit' . '?back_to_page=' . $paginate_data['current_page']) }}" class="site-color">
                                        <i class="users-edit-icon feather icon-edit-1 mr-50"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('cms/menu/' . $menu->id . '?back_to_page=' . $paginate_data['current_page']) }}" class="text-danger">
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
                    <h1 class="text-center">There are no custom items in the menu...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection