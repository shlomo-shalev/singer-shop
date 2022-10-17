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
                        <h4 class="card-title">Update User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ url('cms/users/' . $user->id) }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="item_id" value="{{ $user->id }}">
                                <input type="hidden" name="back_to_page" value="{{ $back_to_page }}">
                                <input type="hidden" name="pas_default" value="yes">
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.select', ['items' => $rids])
                                        @slot('name') rid @endslot
                                        @slot('item_id') {{ $user->rid }} @endslot
                                        @slot('label') Authorization @endslot
                                        @endcomponent
                                            
                                        @component('components.form_cms.text')
                                        @slot('name') name @endslot
                                        @slot('title') Name @endslot
                                        @slot('default_old') {{ $user->name }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') email @endslot
                                        @slot('type') email @endslot
                                        @slot('title') Email @endslot
                                        @slot('default_old') {{ $user->email }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') password @endslot
                                        @slot('type') password @endslot
                                        @slot('title') Password @endslot
                                        @slot('is_old') @endslot
                                        @slot('default_old') @endslot
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'is_enter',
                                            'title' => 'Enter',
                                            'is_checked' => true,
                                            'default_checked' => $user->is_enter,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Update',
                                            'redirect' => 'cms/users'  . '?page=' . $back_to_page,
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