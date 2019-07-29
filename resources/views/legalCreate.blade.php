@extends('layouts.design')

@section('content')

    <script>
        $(document).ready(function() {
            var max_fields_court      = 10; //maximum input boxes allowed
            var wrapper_court         = $(".input_fields_wrap"); //Fields wrapper
            var add_button_court      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button_court).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields_court){ //max input box allowed
                    x++; //text box increment
                    $(wrapper_court).append('<div class="row" style="margin-right: 0">{{ csrf_field() }}<div class="col l2 input-field"><input id="company_name" name="company_name_'+x+'" type="text" class="validate" required><label for="company_name_'+x+'">Company Name</label></div><div class="input-field col l2"> <select name="debt_status_'+x+'" required> <option value="" disabled selected>Choose your option</option> <option value="AzInTelecom owes">AzInTelecom owes</option> <option value="Customer owes">Customer owes</option> </select><label>Debt Status</label></div><div class="col l2 input-field"><input id="amount" name= "amount_'+x+'" type="number" class="validate"><label for="amount_'+x+'">Total Amount</label></div><div class="col l3 input-field"><input id="amount_in_month" name="amount_in_month_'+x+'" type="number" class="validate"><label for="amount_in_month_'+x+'">Amount paid/received in a month</label></div><div class="col l3" style="padding-top: 18px"></div><button style="margin-left: 12px" class="btn remove_field">Delete<i class="material-icons right">delete</i></button>'); //add input box
                    $('select').not('.disabled').formSelect();
                }
            });

            $(wrapper_court).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
{{-- <---------------------------------------------------------------------->--}}

        $(document).ready(function() {
            var max_fields_agr = 10;
            var wrapper_agr = $(".agr_wrap");
            var add_button_agr = $(".add_button_agr");

            var x = 1;
            $(add_button_agr).click(function (e) {
                e.preventDefault();
                if(x<max_fields_agr){
                    x++;
                    $(wrapper_agr).append('<div class="row"><div class="col l4 input-field"><select name="agr_type_'+x+'"><option value="" disabled selected>Choose agreement type</option><option value="Satinalmalar uzre muqavileler">Satinalmalar uzre muqavileler</option><option value="Razilashma xitam(Idealand)">Razilashma xitam(Idealand)</option><option value="Satinalma uzre elaveler">Satinalma uzre elaveler</option><option value="Add more">Add more</option></select></div><div class="col l2 input-field"><select name="agr_status_'+x+'"><option class="disabled selected">Choose status</option><option value="Icraatdadir">Icraatdadir</option><option value="Icra olunub">Icra olunub</option></select></div><div class="col l3 input-field"><input id="aggCount" name="agr_count_'+x+'" type="number" class="validate"><label for="aggCount">Count</label></div><div class="col l3" style="padding-top: 18px"></div><button style="margin-left: 12px" class="btn waves-effect waves-light remove_field">Delete<i class="material-icons right">delete</i></button></div>');
                    $('select').not('.disabled').formSelect();
                }
            });
            $(wrapper_agr).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
{{-- <-------------------------------------------------------------->--}}

        $(document).ready(function() {
            var max_fields_prb = 10;
            var wrapper_prb = $(".prb_wrap");
            var add_button_prb = $(".add_button_prb");

            var x = 1;
            $(add_button_prb).click(function (e) {
                e.preventDefault();
                if(x<max_fields_prb){
                    x++;
                    $(wrapper_prb).append('<div class="row"><div class="col l3 input-field"><input id="problem" name="problem_'+x+'" type="text" class="validate"><label for="problem">Problem</label></div><div class="col l2 input-field"><input id="problem_status" name="problem_status_'+x+'" type="text" class="validate"><label for="problem_status">Status</label></div><div class="col l2 input-field"><input id="problem_solution" name="problem_solution_'+x+'" type="text" class="validate"><label for="problem_solution">Suggested solution</label></div><div class="col l2 input-field"><input id="execution_time" name="execution_time_'+x+'" type="text" class="validate"><label for="execution_time">Execution time</label></div><div class="col l3 input-field" style="padding-top: 18px"></div><button style="margin-left: 12px" class="btn waves-effect waves-light remove_field">Delete<i class="material-icons right">delete</i></button>');
                    $('select').not('.disabled').formSelect();
                }
            });
            $(wrapper_prb).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

{{-- <--------------------------------------------------------------------->--}}

        $(document).ready(function(){
            $('select').not('.disabled').formSelect();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
        });

        });

    </script>

{{-- <----------------------------------------------------------------------------------------------------->--}}

    <div class="page" style="padding-left: 30px">
        <form method="POST" action="/dashboard/legal">
            <div class="row" style="margin-top: 5px">
                @include('inc.messages')
                <div class="col l4 input-field">
                    <input type="text" name="date" class="datepicker" required>
                    <label for="date">Choose date for report</label>
                </div>
            </div>

{{-- <----------------------------------------------------------------------------------------------------->--}}

            <blockquote>
                <h3>Court</h3>
            </blockquote>
            <div class="input_fields_wrap">
            <div class="row" style="margin-right: 0">
                    {{ csrf_field() }}
                    <div class="col l2 input-field">
                        <input id="company_name_1" name="company_name_1" type="text" class="validate" required>
                        <label for="company_name_1">Company Name</label>
                    </div>
                    <div class="input-field col l2">
                            <select name="debt_status_1" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="AzInTelecom owes">AzInTelecom owes</option>
                                <option value="Customer owes">Customer owes</option>
                            </select>
                        <label>Debt Status</label>
                    </div>
                    <div class="col l2 input-field">
                        <input id="amount" name= "amount_1" type="number" class="validate">
                        <label for="amount">Total Amount</label>
                    </div>
                    <div class="col l3 input-field">
                        <input id="amount_in_month" name="amount_in_month_1" type="number" class="validate">
                        <label for="amount_in_month_1">Amount paid/received in a month</label>
                    </div>
                    <div class="col l3" style="padding-top: 18px">
                        <button class="btn waves-effect waves-light add_field_button">add court<i class="material-icons right">add</i></button>
    {{--                    <button class="btn waves-effect waves-light">submit<i class="material-icons right">search</i></button>--}}
                    </div>
                </div>
            </div>

{{-- <----------------------------------------------------------------------------------------------------->--}}

            <blockquote>
                <h3>Agreement</h3>
            </blockquote>
            <div class="agr_wrap">
                <div class="row">
                    <div class="col l4 input-field">
                        <select name="agr_type_1">
                            <option value="" disabled selected>Choose agreement type</option>
                            <option value="Satinalmalar uzre muqavileler">Satinalmalar uzre muqavileler</option>
                            <option value="Razilashma xitam(Idealand)">Razilashma xitam(Idealand)</option>
                            <option value="Satinalma uzre elaveler">Satinalma uzre elaveler</option>
                            <option value="Add more">Add more</option>
                        </select>
                    </div>
                    <div class="col l2 input-field">
                        <select name="agr_status_1">
                            <option class="disabled selected">Choose status</option>
                            <option value="Icraatdadir">Icraatdadir</option>
                            <option value="Icra olunub">Icra olunub</option>
                        </select>
                    </div>
                    <div class="col l3 input-field">
                        <input id="aggCount" name="agr_count_1" type="number" class="validate">
                        <label for="aggCount">Count</label>
                    </div>
                    <div class="col l3" style="padding-top: 18px">
                        <button class="btn waves-effect waves-light add_button_agr">add agr<i class="material-icons right">add</i></button>
        {{--                <button class="btn waves-effect waves-light">submit<i class="material-icons right">search</i></button>--}}
                    </div>
                </div>
            </div>

{{-- <----------------------------------------------------------------------------------------------------->--}}
            <blockquote>
                <h3>Problem</h3>
            </blockquote>
            <div class="prb_wrap">
                <div class="row">
                    <div class="col l3 input-field">
                        <input id="problem" name="problem_1" type="text" class="validate">
                        <label for="problem">Problem</label>
                    </div>
                    <div class="col l2 input-field">
                        <input id="problem_status" name="problem_status_1" type="text" class="validate">
                        <label for="problem_status">Status</label>
                    </div>
                    <div class="col l2 input-field">
                        <input id="problem_solution" name="problem_solution_1" type="text" class="validate">
                        <label for="problem_solution">Suggested solution</label>
                    </div>
                    <div class="col l2 input-field">
                        <input id="execution_time" name="execution_time_1" type="text" class="validate">
                        <label for="execution_time">Execution time</label>
                    </div>
                    <div class="col l3 input-field" style="padding-top: 18px">
                        <button class="btn waves-effect waves-light add_button_prb">add problem<i class="material-icons right">add</i></button>
                        <button class="btn ">submit<i class="material-icons right">search</i></button>
                    </div>
                </div>
            </div>
        </form>
{{--        <script>--}}
{{--            $(document).ready(function() {--}}
{{--                $('select').not('.disabled').formSelect();--}}
{{--                var max_fields      = 10; //maximum input boxes allowed--}}
{{--                var wrapper         = $(".input_fields_wrap"); //Fields wrapper--}}
{{--                var add_button      = $(".add_field_button"); //Add button ID--}}

{{--                var x = 1; //initlal text box count--}}
{{--                $(add_button).click(function(e){ //on add input button click--}}
{{--                    e.preventDefault();--}}
{{--                    if(x < max_fields){ //max input box allowed--}}
{{--                        x++; //text box increment--}}
{{--                        $(wrapper).append(' <div class="row" style="margin-right: 0">{{ csrf_field() }}<div class="col l2 input-field"><input id="company_name" name="company_name" type="text" class="validate" required><label for="company_name">Company Name</label></div><div class="input-field col l2"> <select name="debt_status" required> <option value="" disabled selected>Choose your option</option> <option value="1">AzInTelecom owes</option> <option value="2">Customer owes</option> </select><label>Debt Status</label></div><div class="col l2 input-field"><input id="amount" name= "amount" type="text" class="validate"><label for="amount">Total Amount</label></div><div class="col l3 input-field"><input id="amount_in_month" name="amount_in_month" type="text" class="validate"><label for="amount_in_month">Amount paid/received in a month</label></div><div class="col l3" style="padding-top: 18px"></div><a href="#" class="remove_field">Remove</a></div>'); //add input box--}}
{{--                    }--}}
{{--                });--}}

{{--                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text--}}
{{--                    e.preventDefault(); $(this).parent('div').remove(); x--;--}}
{{--                })--}}
{{--            });--}}
{{--        </script>--}}
{{--        <div class="input_fields_wrap">--}}
{{--            <button class="add_field_button">Add More Fields</button>--}}
{{--            <div><input type="text" name="mytext[]"></div>--}}
{{--        </div>--}}
    </div>
@endsection