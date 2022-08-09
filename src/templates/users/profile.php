<?php include('../src/templates/header.php');?>

    <table class='layout'>
        <tr>
            <td class='header'>
                Мой профиль
            </td>
            <td>
                <h3>Аватар:</h3>
                <span></span>
                <form action="profile" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file" name="avatar" accept=".jpg,.png">
                    <input type="submit" value="Сохранить">
                </form>
              
            </td>
        </tr>
        
        
        
        <?php include('../src/templates/footer.php');?>