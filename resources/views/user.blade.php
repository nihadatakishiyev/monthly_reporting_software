@extends('layouts.design')

@section('content')
    <div class="container">
        <div class="container">
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.modal');
                    var instances = M.Modal.init(elems, options);
                });

                // Or with jQuery

                $(document).ready(function(){
                    $('.modal').modal();
                });

                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('select');
                    var instances = M.FormSelect.init(elems, options);
                });

                // Or with jQuery

                $(document).ready(function(){
                    $('select').formSelect();
                });

                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.datepicker');
                    var instances = M.Datepicker.init(elems, options);
                });

                // Or with jQuery

                $(document).ready(function(){
                    $('.datepicker').datepicker();
                });
            </script>
            <div class="section">
                <div class="row">
                    @include('inc.messages')
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-image text-center">
                                <img src="{{asset('/images/pp.png')}}">
                            </div>
                            <div class="card-content center">
                                <h5>{{$user->name}} {{$user->surname}}</h5>
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                    <tr>
                                        <td>Birthday</td>
                                        <td>{{$user->birth_date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>{{$user->position}}</td>
                                    </tr>
                                    <tr>
                                        <td>Unit</td>
                                        <td>{{$user->org_unit}}</td>
                                    </tr>
                                    <tr>
                                        <td>Employment type</td>
                                        <td>{{$user->type}}</td>
                                    </tr>
                                    <tr>
                                        <td>Education</td>
                                        <td>{{$user->education}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(Auth::id()==$user->id or Auth::id() ==0)
                                    <br/>
                                    <!-- Edit modal -->
                                    <a data-target = "modal1" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">edit</i>Edit Profile</a>
                                    @include('inc.editModal')
                                    <!-- Delete modal -->
                                    <a data-target = "modal2" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">delete</i>Delete Profile</a>
                                    @include('inc.deleteModal')
                                @else
    {{--                                    {{lluminate\Support\Facades\Auth::id()}}--}}
    {{--                                    {{$user->id}}--}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection