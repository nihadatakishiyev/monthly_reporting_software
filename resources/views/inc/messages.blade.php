@if ($message = session()->get('success'))
    <div class="row">
        <div class="col s12 m10 l10">
            <div class="chip green" style="padding: 10px 10px 10px 10px; width: 100%; height: 50px;">
                <i class=" close material-icons right white-text">close</i>
                <i class="material-icons white-text left" style="padding-top: 2px;">check_circle</i>
                <h6 class="white-text"><b>SUCCESS! &nbsp;</b>{{$message}}<h6>
            </div>
        </div>
    </div>
@endif

@if ($message = session()->get('error'))
    <div class="row">
        <div class="col s12 m10 l10">
            <div class="chip red" style="padding: 10px 10px 10px 10px; width: 100%; height: 50px;">
                <i class=" close material-icons right white-text">close</i>
                <i class="material-icons white-text left" style="padding-top: 2px;">check_circle</i>
                <h6 class="white-text"><b>ERROR! &nbsp;</b>{{$message}}<h6>
            </div>
        </div>
    </div>
@endif


@if ($message = session()->get('warning'))
    <div class="row">
        <div class="col s12 m10 l10">
            <div class="chip yellow" style="padding: 10px 10px 10px 10px; width: 100%; height: 50px;">
                <i class=" close material-icons right white-text">close</i>
                <i class="material-icons white-text left" style="padding-top: 2px;">check_circle</i>
                <h6 class="white-text"><b>WARNING! &nbsp;</b>{{$message}}<h6>
            </div>
        </div>
    </div>
@endif


@if ($message = session()->get('info'))
    <div class="row">
        <div class="col s12 m10 l10">
            <div class="chip blue" style="padding: 10px 10px 10px 10px; width: 100%; height: 50px;">
                <i class=" close material-icons right white-text">close</i>
                <i class="material-icons white-text left" style="padding-top: 2px;">check_circle</i>
                <h6 class="white-text"><b>INFO! &nbsp;</b>{{$message}}<h6>
            </div>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
@endif