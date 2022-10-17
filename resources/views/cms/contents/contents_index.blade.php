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
                        'title' => 'Contents',
                        'items' => [
                            'Contents' => '',
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
                    @slot('url') cms/contents/create @endslot
                    @slot('title') Content @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($contents->count())
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Menu Link</th>
                                <th class="text-center">Visibility</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                <td class="text-center">{{ $content->cntitle }}</td>
                                <td class="text-center">
                                    <a href="{{ url($menus->find($content->menu_id)->url) }}" target="_blank" class="site-color">
                                        {{ $menus->find($content->menu_id)->link }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $content->visibility ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($content->updated_at)) }}</td>
                                <td class="text-center">
                                <a href="{{ url('cms/contents/' . $content->id . '/edit' . '?back_to_page=' . $paginate_data['current_page']) }}" class="site-color">
                                        <i class="users-edit-icon feather icon-edit-1 mr-50"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('cms/contents/' . $content->id . '?back_to_page=' . $paginate_data['current_page']) }}" class="text-danger">
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
                    <h1 class="text-center">There are no contents...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection