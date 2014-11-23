<?php 
    require_once ("Includes/session.php");
    require_once ("Includes/simplecms-config.php"); 
    require_once ("Includes/connectDB.php");
    ob_start();

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT id, username FROM users WHERE username = ? AND password = SHA(?) LIMIT 1";
        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('ss', $username, $password);

        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows == 1)
        {
            $statement->bind_result($_SESSION['userid'], $_SESSION['username']);
            $statement->fetch();
            header ("Location: index.php");
        }
        else
        {
            echo "El usuario o contraseña son incorrectas.";
        }
    }
?>
<div class="content">
    <h2>Iniciar sesión</h2>
        <form action="logon.php" method="post">
            <fieldset class="col-md-6">
            <legend></legend>
            <div class="form-group">
                <label for="username" class="col-md-4 control-label">Ususario:</label> 
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
            <input type="submit" name="submit" value="iniciar sesión" class="btn btn-success"/>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </fieldset>
    </form>
</div>
</div>

<?php $contenido = ob_get_clean();?>
<?php include "Includes/master.php";?>