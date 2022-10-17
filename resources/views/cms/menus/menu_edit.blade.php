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
                            'Menu' => 'menu',
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
                        <h4 class="card-title">Edit Item To The Menu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form action="{{ url('cms/menu/' . $menu->id) }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off">
                            @csrf
                            @method('PUT')
                        <input type="hidden" name="item_id" value="{{ $menu->id }}">
                        <input type="hidden" name="back_to_page" value="{{ $back_to_page }}">
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.text')
                                        @slot('name') title @endslot
                                        @slot('is_title') 1 @endslot
                                        @slot('title') Title @endslot
                                        @slot('default_old') {{ $menu->title }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') url @endslot
                                        @slot('is_url') 1 @endslot
                                        @slot('title') Url @endslot
                                        @slot('title_placehol') Url (Permitted: lowercase letters, numbers and hyphens) @endslot
                                        @slot('default_old') {{ $menu->url }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') link @endslot
                                        @slot('title') Link @endslot
                                        @slot('default_old') {{ $menu->link }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'visibility',
                                            'title' => 'Visibility',
                                            'is_checked' => true,
                                            'default_checked' => $menu->visibility,
                                            'is_option_two' => true,
                                            'name_two' => 'open',
                                            'title_two' => 'Open',
                                            'is_checked_two' => true,
                                            'default_checked_two' => $menu->is_open,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Update',
                                            'redirect' => 'cms/menu'  . '?page=' . $back_to_page,
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