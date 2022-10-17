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
                            'Categories' => 'categories',
                            'Delete Item' => '',
                        ]
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card p-2">
                    <div class="card-header">
                        <h4 class="card-title">Are you sure you want to delete the item?</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form action="{{ url('cms/categories/' . $category_id) }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off">
                            @csrf
                            @method('DELETE')
                        <input type="hidden" name="back_to_page" value="{{ $back_to_page }}">
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Delete',
                                            'redirect' => 'cms/categories' . '?page=' . $back_to_page,
                                            'delete' => true,
                                        ])
                                        @endcomponent
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection