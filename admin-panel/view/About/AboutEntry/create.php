<?php
include_once '../../Include/IncludePages/header.php';
?>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>


                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <br><br>
                        <div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <form method="POST" action="store.php" role="form">
                                            <div class="form-group">
                                                <h2>About Add Form</h2>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="title">Title</label>
                                                <input id="title" name="title" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="signupEmail">Description</label>
                                                <textarea id="description" name="description" class="form-control" onkeyup="auto_grow(this)"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create About Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>
<?php
include_once '../../Include/IncludePages/footer.php';
?>