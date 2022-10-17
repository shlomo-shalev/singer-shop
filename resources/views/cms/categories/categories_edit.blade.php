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
                            'Update Item' => '',
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
                        <h4 class="card-title">Update Category</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ url('cms/categories/' . $category->id) }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="item_id" value="{{ $category->id }}">
                                <input type="hidden" name="back_to_page" value="{{ $back_to_page }}">
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.text')
                                        @slot('name') title @endslot
                                        @slot('is_title') 1 @endslot
                                        @slot('title') Title @endslot
                                        @slot('default_old') {{ $category->title }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') url @endslot
                                        @slot('is_url') 1 @endslot
                                        @slot('title') Url @endslot
                                        @slot('default_old') {{ $category->url }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.description')
                                        @slot('name') description @endslot
                                        @slot('title') Description @endslot
                                        @slot('default_old') {{ $category->description }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.view_image', [
                                            'src' => $category->image,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.image')
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'visibility',
                                            'title' => 'Visibility',
                                            'is_checked' => true,
                                            'default_checked' => $category->visibility,
                                            'is_option_two' => true,
                                            'name_two' => 'open',
                                            'title_two' => 'Open',
                                            'is_checked_two' => true,
                                            'default_checked_two' => $category->is_open,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Update',
                                            'redirect' => 'cms/categories' . '?page=' . $back_to_page,
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