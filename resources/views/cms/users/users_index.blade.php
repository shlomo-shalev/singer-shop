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
                        'title' => 'Users',
                        'items' => [
                            'Users' => ''
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
                    @slot('url') cms/users/create @endslot
                    @slot('title') User @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($users->count())
            <section id="data-list-view" class="data-list-view-header">
                <div class="table-responsive">
                    <table class="table data-list-view table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Is enter</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->is_enter ? 'Can' : 'Can\'t' }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($user->updated_at)) }}</td>
                                <td class="text-center">{{ date('d/m/y', strtotime($user->created_at)) }}</td>
                                @if ($user->id != 1)
                                <td class="text-center">
                                    <a href="{{ url('cms/users/' . $user->id . '/edit' . '?back_to_page=' . $paginate_data['current_page']) }}" class="site-color">
                                            <i class="users-edit-icon feather icon-edit-1 mr-50"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('cms/users/' . $user->id . '?back_to_page=' . $paginate_data['current_page']) }}" class="text-danger">
                                            <i class="users-delete-icon feather icon-trash-2"></i>
                                        </a>
                                    </td>
                                @else
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </table>
                </div>
            </section>
            <div class="row">
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