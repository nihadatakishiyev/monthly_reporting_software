@extends('layouts.design')

@section('content')
    <div class="row">
        <div class="col l3">
            <ul id="slide-out" class="sidenav sidenav-fixed" style="padding-top: 55px">
                <li id="dashboard"><a><h4><i class="material-icons">dashboard</i>Dashboard</h4></a></li>
                <li class="{{request()->segment(count(request()->segments()))=="hr" ? "activem": ""}}" id="hr"><a href="/dashboard/hr"><i class="material-icons" style="color: red">face</i>Human Resources</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="legal" ? "activem": ""}}" id="leg"><a href="/dashboard/legal"><i class="material-icons" style="color: green">account_balance</i>Legal</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="tech" ? "activem": ""}}" id="tech"><a href="/dashboard/technology"><i class="material-icons" style="color: orange">developer_board</i>Technology</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="com" ? "activem": ""}}" id="com"><a href="/dashboard/commercial"><i class="material-icons" style="color: blue">monetization_on</i>Commercial</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="ivt" ? "activem": ""}}" id="ivt"><a href="/dashboard/ivt"><i class="material-icons" style="color: yellow">record_voice_over</i>IVT</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="cer" ? "activem": ""}}" id="cer"><a href="/dashboard/certificate"><i class="material-icons" style="color: purple">file_copy</i>Certificate</a></li>
                <li class="{{request()->segment(count(request()->segments()))=="fin" ? "activem": ""}}" id="fin"><a href="/dashboard/finance"><i class="material-icons" style="color: red">euro_symbol</i>Finance</a></li>
            </ul>
        </div>
        <div class="col l9" style="margin-right: 30px; padding-top: 30px; margin-left: -30px">
            <div>
{{--                <div class="card">--}}
{{--                    <div class="card-content">--}}
                        @yield('dep')
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
