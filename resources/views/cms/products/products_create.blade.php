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
                            'Products' => 'products',
                            'Create Item' => '',
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
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form action="{{ url('cms/products') }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.select', ['items' => $categories])
                                        @slot('name') category @endslot
                                        @slot('option_default') Select an category... @endslot
                                        @slot('item_id') @endslot
                                        @slot('label') Category @endslot
                                        @slot('no_edit') 1 @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') title @endslot
                                        @slot('is_title') 1 @endslot
                                        @slot('title') Title @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') url @endslot
                                        @slot('is_url') 1 @endslot
                                        @slot('title') Url @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') price @endslot
                                        @slot('title') Price @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.description')
                                        @slot('name') description @endslot
                                        @slot('title') Description @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.view_image', [
                                            'create' => true,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.image')
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'visibility',
                                            'title' => 'Visibility',
                                            'is_option_two' => true,
                                            'name_two' => 'open',
                                            'title_two' => 'Open',
                                            'is_checked_two' => true,
                                            'default_checked_two' => true,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Create',
                                            'redirect' => 'cms/products',
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