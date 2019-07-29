@extends('layouts.design')

@section('content')

    <script>
        $(document).ready(function() {
            $('input#input_text, textarea#textarea2').characterCounter();
        });

    </script>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Add Car</h4>
            <form class="col s12"role="form" method="POST" action="{{ route('car.store')}}">
                @csrf
                <input name="user_id" type="hidden" value="{{$user->id}}">
                <div class="row">
                    <div class="input-field ">
                        <input placeholder="Placeholder" id="first_name" type="text" name="licence_plate" class="validate" required>
                        <label for="first_name">Licence Plate</label>
                    </div>
                    <div class="input-field ">
                        <input placeholder="Placeholder" id="first_name" type="text" name="color"  class="validate" required>
                        <label for="first_name">Color</label>
                    </div>
                    <div class="input-field ">
                        <input placeholder="Placeholder" id="first_name" type="text" name="model" class="validate" required>
                        <label for="first_name">Model</label>
                    </div>
                    <div class="input-field ">
                        <button type="submit" name="submit" value="Submit" class="waves-effect waves-light btn white-text "
                                style=" width: 100%;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection