@extends('cms.cms_master')
@section('main_content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ url('cms/categories') }}">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-center pb-0 pb-2">
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-credit-card text-success font-medium-5"></i>
                                    </div>
                                </div>
                            <h2 class="text-bold-700 mt-1">{{ $total_cpu['categories'] }}</h2>
                                <p class="mb-0 text-dark">Categories total</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ url('cms/products') }}">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-center pb-0 pb-2">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-clone text-warning font-medium-5"></i>
                                        <!--<i class="feather icon-package text-warning font-medium-5"></i>-->
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{ $total_cpu['products'] }}</h2>
                                <p class="mb-0 text-dark">Products total</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ url('cms/orders') }}">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-center pb-0 pb-2 ">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{ $total_cpu['orders'] }}</h2>
                                <p class="mb-0 text-dark">Orders total</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ url('cms/users') }}">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-center pb-0 pb-2 ">
                                <div class="avatar bg-rgba-info p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{ $total_cpu['users'] }}</h2>
                                <p class="mb-0 text-dark">Users total</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <a href="{{ url('cms/orders') }}" class="card-header mx-sm-2 d-flex justify-content-canter align-items-end">
                                <h4 class="card-title">Recent orders</h4>
                                <div class="site-color">All orders</div>
                            </a>
                            <div class="card-content">
                                <div class="content-body mx-2 mx-sm-3 my-2">
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
                                    @else
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group my-3">
                                            <h1 class="text-center">There are no Orders...</h1>
                                            </div>
                                        </div>
                                    </div>
                                    @endif        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection