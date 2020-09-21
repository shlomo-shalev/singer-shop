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
                            'Users' => 'users',
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
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form action="{{ url('cms/users') }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.select', ['items' => $rids])
                                        @slot('name') rid @endslot
                                        @slot('option_default') Select an Authorization... @endslot
                                        @slot('item_id') @endslot
                                        @slot('label') Authorization @endslot
                                        @slot('no_edit') 1 @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') name @endslot
                                        @slot('title') Name @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') email @endslot
                                        @slot('title') Email @endslot
                                        @slot('type') email @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') password @endslot
                                        @slot('type') password @endslot
                                        @slot('title') Password @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'is_enter',
                                            'title' => 'Enter',
                                            'is_checked' => true,
                                            'default_checked' => true,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Create',
                                            'redirect' => 'cms/users',
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