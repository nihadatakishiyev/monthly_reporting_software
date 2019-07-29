<div id="modal3" class="modal">
    <div class="modal-content">
        <h4>Update Statistics</h4>
        <p>Updating statistics may take a while as it collects information from various sources. Are you sure you want to proceed?</p>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col l9"></div>
            <div class="col l3">
                <form method="POST" action="/dashboard/hr/update">
                    @method('PUT')
                    <button type="button" name="no" value="no" class="btn red modal-action modal-close waves-effect waves-light btn white-text">
                        No
                    </button>
                    <button type="submit" name="yes" value="yes" class="waves-effect waves-light btn white-text ">
                        Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>