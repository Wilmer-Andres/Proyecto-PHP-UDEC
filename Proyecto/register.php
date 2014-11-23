<?php 
    require_once ("Includes/simplecms-config.php"); 
    require_once  ("Includes/connectDB.php");
    include("Includes/header.php"); 

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "INSERT INTO users (username, password) VALUES (?, SHA(?))";

        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('ss', $username, $password);
        $statement->execute();
        $statement->store_result();

        $creationWasSuccessful = $statement->affected_rows == 1 ? true : false;
        if ($creationWasSuccessful)
        {
            $userId = $statement->insert_id;

            $addToUserRoleQuery = "INSERT INTO users_in_roles (user_id, role_id) VALUES (?, ?)";
            $addUserToUserRoleStatement = $databaseConnection->prepare($addToUserRoleQuery);

            // TODO: Extract magic number for the 'user' role ID.
            $userRoleId = 2;
            $addUserToUserRoleStatement->bind_param('dd', $userId, $userRoleId);
            $addUserToUserRoleStatement->execute();
            $addUserToUserRoleStatement->close();

            $_SESSION['userid'] = $userId;
            $_SESSION['username'] = $username;
            header ("Location: index.php");
        }
        else
        {
            echo "Error al crear el usuario";
        }
    }
?>
<div id="main">
    <h2>Registro <small>nuevo usuario</small> </h2>
        <form action="register.php" method="post">
            <fieldset class="col-md-6">
                <legend></legend>
                <div class="form-group">
                    <label for="username" class="col-md-4 control-label">Username:</label> 
                    <div class="col-md-8">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nickname" />
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Contraseña:</label>
                    <div class="col-md-8">
                        <input type="password" name="password" id="password" class="form-control" placeholder="contraseña"/>
                    </div>
                </div>
                <hr>
                <input type="submit" name="submit" value="crear usuario" class="btn btn-success"/>
                <a href="index.php" class="btn btn-danger">cancelar</a>
            </fieldset>
        </form>
     </div>
</div> <!-- End of outer-wrapper which opens in header.php -->
<?php
    include ("Includes/footer.php");
?>