@extends('layouts.admin_layout')
@section('title', 'WETO | Dashboard')
@section('content')
    <div class="app-main__inner">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Dashboard</div>
        </div>
        <div class="tabs-animation">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="dashboard-wrap">
                                <ul>
                                    <li>
                                        <section>
                                            <h2>Properties</h2>
                                            <i class="fa fa-building"></i>
                                            <span>{{$properties}}</span>
                                        </section>
                                    </li>
                                    <li>
                                        <section>
                                            <h2>Users</h2>
                                            <i class="fa fa-users"></i>
                                            <span>{{$users}}</span>
                                        </section>
                                    </li>
                                    <li>
                                        <section>
                                            <h2>Partners</h2>
                                            <i class="fa fa-users"></i>
                                            <span>{{$partners}}</span>
                                        </section>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
