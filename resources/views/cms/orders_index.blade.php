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
                        'title' => 'Orders',
                        'items' => [
                            'Orders' => '',
                        ]
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($orders->count())
            <section id="data-list-view" class="data-list-view-header">
                    <div class="table-responsive">
                        <table class="table data-list-view table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Order id</th>
                                    <th class="text-center">User name</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">More defails</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>

                                    <td class="text-center">{{ $order->id }}</td>
                                    <td class="text-center">
                                        @if ($order->name)
                                            {{ $order->name }}
                                        @else
                                        <b class="text-danger">User deleted</b>
                                        @endif
                                    </td>
                                    <td class="text-center">${{ $order->total }}</td>
                                    <td class="text-center">{{ collect(unserialize($order->data))->sum('quantity') }}</td>
                                    <td class="text-center">{{ date('d/m/y', strtotime($order->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('cms/orders/' . $order->id) }}" class="site-color">
                                            <i class="fa fa-share-square fz-20"></i>
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
                    <h1 class="text-center">There are no Orders...</h1>
                    </div>
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
@endsection