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
                            'Contents' => 'contents',
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
                        <h4 class="card-title">Update Content To The Menu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form action="{{ url('cms/contents/' . $content->id) }}" class="form" id="form-add-item-to-the-menu" method="POST" novalidate="novalidate" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="item_id" value="{{ $content->id }}">
                            <input type="hidden" name="back_to_page" value="{{ $back_to_page }}">
                                <div class="form-body">
                                    <div class="row">
                                        @component('components.form_cms.select', ['items' => $menu])
                                        @slot('name') menu_link @endslot
                                        @slot('item_id') {{ $content->menu_id }} @endslot
                                        @slot('label') Menu_Link @endslot
                                        @endcomponent

                                        @component('components.form_cms.text')
                                        @slot('name') title @endslot
                                        @slot('title') Title @endslot
                                        @slot('default_old') {{ $content->cntitle }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.description')
                                        @slot('name') description @endslot
                                        @slot('title') Description @endslot
                                        @slot('default_old') {{ $content->cndescription }} @endslot
                                        @endcomponent

                                        @component('components.form_cms.checkbox', [
                                            'name' => 'visibility',
                                            'title' => 'Visibility',
                                            'is_checked' => true,
                                            'default_checked' => $content->visibility,
                                        ])
                                        @endcomponent

                                        @component('components.form_cms.submit', [
                                            'title_submit' => 'Update',
                                            'redirect' => 'cms/contents' . '?page=' . $back_to_page,
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