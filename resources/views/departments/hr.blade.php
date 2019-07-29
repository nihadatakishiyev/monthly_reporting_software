@extends('layouts.dashboard_gen')

@section('dep')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.modal').modal();
        });

    </script>
    <div class="row">
        <div class="col s12">
           @include('inc.messages')

            <div class="row">
                <div class="input-field col l8">
                    {{--                    <i class="material-icons prefix">search</i>--}}
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">search the best</label>
                </div>
                <form action="/dashboard/hr/" method="POST">
                    @method('PUT')
                    <div class="col l4" style="padding-top: 18px">
                        <a class="waves-effect waves-light btn"><i class="material-icons left">search</i>search</a>
                        <a data-target = "modal3" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">edit</i>Update statistics</a>{{--                        <div id="modal2" class="modal">--}}
{{--                            <div class="modal-content">--}}
{{--                                <h4>Delete User</h4>--}}
{{--                                <p>Are you sure to delete this user?</p>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col l9"></div>--}}
{{--                                    <div class="col l3">--}}
{{--                                        {!! Form::open(['action'=> ['UserController@destroy', $user], 'method' => 'POST']) !!}--}}
{{--                                        {{method_field('DELETE')}}--}}
{{--                                        <button type="button" name="no" value="no" class="btn red modal-action modal-close waves-effect waves-light btn white-text">--}}
{{--                                            No--}}
{{--                                        </button>--}}
{{--                                        <button type="submit" name="yes" value="yes" class="waves-effect waves-light btn white-text ">--}}
{{--                                            Yes--}}
{{--                                        </button>--}}
{{--                                        {!! Form::close() !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a  href="/dashboard/hr/update" class="waves-effect waves-light btn"><i class="material-icons left">create</i>Update report</a>--}}
                            @include('inc.updateModal')
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<select>--}}
    {{--    <option>Mango</option>--}}
    {{--    <option>Orange</option>--}}
    {{--    <option>Apple</option>--}}
    {{--</select>--}}

    {{--    Employee type division--}}
    <div class="card" style="margin-top: -20px">
        <div class="card-content">
            <div class="row">
                <div class="col l7" style="padding-top: 20px">
                    <table class="highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Employee type</th>
                            <th>Total number of employees</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>AzInTelecom</th>
                            <th>{{$type[0]}}</th>
                        </tr>
                        <tr>
                            <th>Outsource</th>
                            <th>{{$type[1]}}</th>
                        </tr>
                        <tr>
                            <th>Ministry</th>
                            <th>{{$type[2]}}</th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>{{$type[0]+$type[1]+ $type[2]}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col l5">
                    {{--                    canvas creation for chart--}}
                    <div style="padding-top: 20px">
                        <canvas id="myChart" width="200" height="150"></canvas>
                        {{-- <progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{--    Js script for chart--}}
    <script>
        var ctx = document.getElementById('myChart');
        var progress = document.getElementById('animationProgress');
        var type = @json($type);
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['AzInTelecom', 'Outsource', 'Ministry'],
                datasets: [{
                    label: '# of Votes',
                    data: [type[0], type[1], type[2]],
                    backgroundColor: [
                        'red',
                        'blue',
                        'green'
                    ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    {{--    Gender division--}}
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col l7">
                    {{--                <h3>Gender stats</h3>--}}
                    {{--                <h6>Male: {{$gender[0]/$user_count *100}} % ({{$gender[0]}} people)</h6>--}}
                    {{--                <h6>Female: {{$gender[1]/$user_count *100}} % ({{$gender[1]}} people)</h6>--}}
                    {{--                <h6>NA: {{$gender[2]/$user_count *100}} % ({{$gender[2]}} people)</h6>--}}
                    <table class="highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Gender</th>
                            <th>Percentage/Number of employees</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Male</th>
                            <th>{{round($gender[0]/$user_count *100)}} % ({{$gender[0]}} people)</th>
                        </tr>
                        <tr>
                            <th>Female</th>
                            <th>{{round($gender[1]/$user_count *100)}} % ({{$gender[1]}} people)</th>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col l5">
                    <canvas id="myyChart" width="200" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
                {{--var male = {!! json_encode($gender->toArray()) !!};--}}
        var ctx = document.getElementById('myyChart');
        var progress = document.getElementById('animationProgress');
        var gender = @json($gender);
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: '# of Votes',
                    data: [gender[0], gender[1]],
                    backgroundColor: [
                        'red',
                        'blue',
                        'yellow'
                    ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    {{--    Education status--}}
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col l7">
                    {{--            <h3>Education stats</h3>--}}
                    {{--            <h6>Bachelor: {{$edu[0]/$user_count *100}} % ({{$edu[0]}} people)</h6>--}}
                    {{--            <h6>Master: {{$edu[1]/$user_count *100}} % ({{$edu[1]}} people)</h6>--}}
                    {{--            <h6>PHD: {{$edu[2]/$user_count *100}} % ({{$edu[2]}} people)</h6>--}}

                    <table class="highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Education Status</th>
                            <th>Percentage/Number of employees</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Tam</th>
                            <th>{{round($edu[3]/$user_count *100)}} % ({{$edu[3]}} people)</th>
                        </tr>
                        <tr>
                            <th>Umumi</th>
                            <th>{{round($edu[4]/$user_count *100)}} % ({{$edu[4]}} people)</th>
                        </tr>
                        <tr>
                            <th>Orta</th>
                            <th>{{round($edu[5]/$user_count *100)}} % ({{$edu[5]}} people)</th>
                        </tr>
                        <tr>
                            <th>Bachelor</th>
                            <th>{{round($edu[0]/$user_count *100)}} % ({{$edu[0]}} people)</th>
                        </tr>
                        <tr>
                            <th>Master</th>
                            <th>{{round($edu[1]/$user_count *100)}} % ({{$edu[1]}} people)</th>
                        </tr>
                        <tr>
                            <th>PHD</th>
                            <th>{{round($edu[2]/$user_count *100)}} % ({{$edu[2]}} people)</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col l5">
                    <canvas id="myyyChart" width="200" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
                {{--var male = {!! json_encode($gender->toArray()) !!};--}}
        var ctx = document.getElementById('myyyChart');
        var progress = document.getElementById('animationProgress');
        var edu = @json($edu);
        var myyyChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Bachelor', 'Master', 'Umumi', 'Orta', 'PHD', 'Tam'],
                datasets: [{
                    label: '# of Votes',
                    data: [edu[0], edu[1], edu[4], edu[5], edu[2], edu[3]],
                    backgroundColor: [
                        'red',
                        'blue',
                        'yellow',
                        'green',
                        'purple',
                        'violet'
                    ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
    <div class="card">
        <div class="card-content">
            <blockquote>
                <h3>Age stats</h3>
                <h6>Avarage age of employers is {{round($testt)}}</h6>
            </blockquote>
        </div>
    </div>
@endsection