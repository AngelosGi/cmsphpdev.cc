<form method='post' action="<?php $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <input class="btn btn-primary" name="submit" type="submit" value="Submit">
    </form>
