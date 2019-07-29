<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Delete User</h4>
        <p>Are you sure to delete this user?</p>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col l9"></div>
            <div class="col l3">
                {!! Form::open(['action'=> ['UserController@destroy', $user], 'method' => 'POST']) !!}
                {{method_field('DELETE')}}
                <button type="button" name="no" value="no" class="btn red modal-action modal-close waves-effect waves-light btn white-text">
                    No
                </button>
                <button type="submit" name="yes" value="yes" class="waves-effect waves-light btn white-text ">
                    Yes
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>