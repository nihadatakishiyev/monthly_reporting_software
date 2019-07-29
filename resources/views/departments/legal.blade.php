@extends('layouts.dashboard_gen')

@section('dep')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <div class="row" style="margin-left: -30px">
        <div class="row">
            <div class="col l3">
                <div class="input-field" style="margin-top: 0;">
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">search the best</label>
                </div>
            </div>
            <div class="col l2">
                <select name="month">
                    <option value="" disabled selected>Choose month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col l2">
                <select name="year">
                    <option value="" disabled selected>Choose year</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>
                <label>Materialize Select</label>
            </div>
            <div class="col l2">
                <select>
                    <option value="" disabled selected>Choose service</option>
                    <option value="1">Court</option>
                    <option value="2">Agreement</option>
                    <option value="3">Problem</option>
                </select>
                <label>Materialize Select</label>
            </div>
            <div class="col l3">
                <button class="btn waves-effect waves-light" type="submit" name = "action">Search
                    <i class="material-icons right">search</i>
                </button>
                <button class="btn waves-effect waves-light" onclick="window.location.href = '/dashboard/legal/create'" type="submit" name = "action">Create Report
                    <i class="material-icons right">create</i>
                </button>
            </div>
        </div>

        <blockquote>
            <h3>Court</h3>
        </blockquote>
        <div class="row">
            <div class="col l7">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Company Name &nbsp;</th>
                        <th>Debt Status &nbsp;</th>
                        <th>Total Amount&nbsp;</th>
                        <th>Amount paid/received within month</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($courts as $court)
                            <tr>
                                <td>
                                    {{$court->company_name}}
                                </td>
                                <td>
                                    {{$court->debt_status}}
                                </td>
                                <td>
                                    {{$court->amount}}
                                </td>
                                <td>
                                    {{$court->amount_in_month}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col l4">

            </div>
        </div>

        <blockquote>
            <h3>Agreement</h3>
        </blockquote>
        <div class="row">
            <div class="col l7">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Agreement type</th>
                            <th>Status</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agrs as $agr)
                            <tr>
                                <td>
                                    {{$agr->agr_type}}
                                </td>
                                <td>
                                    {{$agr->status}}
                                </td>
                                <td>
                                    {{$agr->count}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col l4">

            </div>
        </div>

        <blockquote>
            <h3>Problem</h3>
        </blockquote>
        <div class="row">
            <div class="col l7">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Problem</th>
                            <th>Status</th>
                            <th>Suggested solution</th>
                            <th>Execution time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prbs as $prb)
                            <tr>
                                <td>
                                    {{$prb->problem}}
                                </td>
                                <td>
                                    {{$prb->status}}
                                </td>
                                <td>
                                    {{$prb->solution}}
                                </td>
                                <td>
                                    {{$prb->execution_time}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col l4">

            </div>
        </div>
    </div>
@endsection