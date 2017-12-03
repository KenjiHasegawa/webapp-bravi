<?php
require_once('layout_header.php');
?>

    <div class='page-header'>
        <h1>REST API</h1>
    </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">GET localhost/webapp-bravi/api/contacts/get_all/</div>
                <div class="panel-body">
                    <form target="_blank" action="api/contacts/get_all.php">
                        <div class="api-submit-buttons">
                            <button type="submit" class="btn btn-default">GET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">GET localhost/webapp-bravi/api/contacts/get_person/</div>
                <div class="panel-body">
                    <form method="get" target="_blank" action="api/contacts/get_person.php">
                        <div>
                            <div class="form-group">
                                <input type="number" name="id" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="FIRST NAME">
                                <input type="text" name="last_name" placeholder="LAST NAME">
                                <input type="text" name="email" placeholder="EMAIL">
                                <input type="text" name="phone" placeholder="PHONE">
                                <input type="text" name="whatsapp" placeholder="WHATSAPP">
                            </div>
                            <div class="api-submit-buttons">
                                <button type="submit" class="btn btn-default">GET</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">POST localhost/webapp-bravi/api/contacts/create/</div>
                <div class="panel-body">
                    <form method="post" target="_blank" action="api/contacts/create.php">
                        <div>
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="FIRST NAME">
                                <input type="text" name="last_name" placeholder="LAST NAME">
                                <input type="text" name="email" placeholder="EMAIL">
                                <input type="text" name="phone" placeholder="PHONE">
                                <input type="text" name="whatsapp" placeholder="WHATSAPP">
                            </div>
                            <div class="api-submit-buttons">
                                <button type="submit" class="btn btn-default">POST</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">POST localhost/webapp-bravi/api/contacts/update/</div>
                <div class="panel-body">
                    <form method="post" target="_blank" action="api/contacts/update.php">
                        <div>
                            <div class="form-group">
                                <input type="number" name="id" placeholder="ID TO UPDATE">
                            </div>
                            <div class="form-group">

                                <input type="text" name="first_name" placeholder="NEW FIRST NAME">
                                <input type="text" name="last_name" placeholder="NEW LAST NAME">
                                <input type="text" name="email" placeholder="NEW EMAIL">
                                <input type="text" name="phone" placeholder="NEW PHONE">
                                <input type="text" name="whatsapp" placeholder="NEW WHATSAPP">
                            </div>
                            <div class="api-submit-buttons">
                                <button type="submit" class="btn btn-default">POST</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">POST localhost/webapp-bravi/api/contacts/delete/</div>
                <div class="panel-body">
                    <form method="post" target="_blank" action="api/contacts/delete.php">
                        <div>
                            <div class="form-group">
                                <input type="number" name="id" placeholder="ID">
                            </div>
                            <div class="api-submit-buttons">
                                <button type="submit" class="btn btn-default">POST</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<?php
require_once('layout_footer.php');
?>