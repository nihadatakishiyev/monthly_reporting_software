<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Edit Profile</h4>
        {{$user->id}}
            {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}
            {{method_field('PUT')}}
                <div class="row">
                <div class="input-field col l6">
                    <input id="name" name="name" type="text" class="validate">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col l6">
                    <input id="surname" name = "surname" type="text" class="validate">
                    <label for="surname">Surname</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <select name="gender">
                        <option value="" disabled selected>Change gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label>Materialize Select</label>
                </div>
                <div class="input-field col l6">
                    <select name="status">
                        <option value="" disabled selected>Change status</option>
                        <option value="work">Work</option>
                        <option value="vocation">Vocation</option>
                        <option value="left">Left</option>
                    </select>
                    <label>Materialize Select</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <textarea id="position" name="position" class="materialize-textarea"></textarea>
                    <label for="position">Position</label>
                </div>
                <div class="input-field col l6">
                    <textarea id="org" name = "org" class="materialize-textarea"></textarea>
                    <label for="org">Organization-unit</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <input id="birthdate" name = "birthdate" type="text" class="datepicker">
                    <label for="birthdate">Birth Date</label>
                </div>
                <div class="input-field col l6">
                    <select name="education">
                        <option value="" disabled selected>Change status</option>
                        <option value="umumi">Ümumi Orta Təhsil</option>
                        <option value="tam">Tam Orta Təhsil</option>
                        <option value="ali">Ali(bakalavr)</option>
                        <option value="master">Ali(magistr)</option>
                        <option value="phd">PHD</option>
                    </select>
                    <label>Change education</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6">
                    <input type="email" class="validate" id="email" name="email">
                    <label for="email">E-mail</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Checker</span>
                </div>
                <div class="input-field col l6">
                    <select name="type">
                        <option value="" disabled selected>Choose Employment type</option>
                        <option value="staff">Staff</option>
                        <option value="outsource">Outsource</option>
                        <option value="ministry">Nazirlik</option>
                    </select>
                </div>
            </div>
            <div class="input-field">
                <button type="submit" name="submit" value="Submit" class="waves-effect waves-light btn white-text "
                        style=" width: 100%;">
                    Submit
                </button>
            </div>
        {!! Form::close() !!}
</div>
</div>