<?php
require_once('layout_header.php');
?>

    <div class='page-header'>
        <h1>Balanced Brackets</h1>
    </div>
    <div id="result">
    </div>
    <form method="post" action="">
        <div class="col-md-10">
            <textarea class="form-control" rows="20" id="input" name="input">[[[(({{}}))]]]</textarea>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Check it!</button>
        </div>

    </form>

<?php
require_once("brackets/brackets.php");
if(isset($_POST) and isset($_POST['input'])){
    check_brackets($_POST['input']);
}
require_once('layout_footer.php');
?>