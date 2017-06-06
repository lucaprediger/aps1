<!--PERMISSOES-->
            <table>
                <?php
                require_once './PermissaoUsuarioDao.php';
                require_once './PermissaoDao.php';
                $per = PermissaoDao::getAll();
                $per->execute();
                while ($r = $per->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
                    ?>
                    <tr id="linha<?php echo $r['perId'] ?>" > 
                        <th scope="row"><?php echo $r['perId']; ?></th> 
                        <td><?php echo $r['perDescricao'] ?></td>
                        <td><input type="checkbox" > </td>
                        <td><input type="checkbox" > </td>
                    </tr> 
                <?php } ?>
                    
            </table>