<?php
require("../conn.php");

if ($act == "del") {
    $sql = "delete from info where id=$id";
    $result = mysql_query($sql);
    if ($result) {
        echo "<script>alert('ɾ���ɹ�');location.href='view.php?type=$type&uname=$uname';</script>";
        exit;
    } else {
        exit("ɾ��ʧ����");

    }
}

include("top.php");

?>

<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
    <tr>
        <td width="100%" height="25" class="back_southidc"><?php echo $type ?>����</td>
    </tr>
    <tr class="tr_southidc">
        <td><br>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="table_southidc">
                <tr bgcolor="#A4B6D7" align="center">
                    <td width="10%" height="25" class="back_southidc">
                        <div>����
                    </td>
                    <td width="10%" height="25" class="back_southidc"><?php echo $type ?>����</td>
                    <td width="10%" height="25" class="back_southidc">����</td>
                    <?php
                    if ($type == '��ְ' || $type == "����") {
                        ?>
                        <td width="12%" height="25" class="back_southidc"><?php echo $type ?>ʱ��</td>
                        <?php
                    } else {
                        ?>
                        <td width="10%" height="25" class="back_southidc">��ʼʱ��</td>
                        <td width="10%" height="25" class="back_southidc">����ʱ��</td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
                $sql = "select * from info where uname='$uname' and type='$type' order by id DESC";

                $result = mysql_query($sql);
                while ($data = mysql_fetch_array($result)) {
                    ?>
                    <tr align="center" class="tdbg">
                    <td height="25"><?php echo $wname ?></td>
                    <td height="25"><?php echo $data["name"] ?></td>
                    <td height="25"><?php echo $data["content"] ?></td>

                    <?php
                    if ($type == '��ְ' || $type == "����") {
                        ?>
                        <td height="25"><?php echo $data["s"] ?></td>

                        <?php
                    } else {
                        ?>
                        <td height="25"><?php echo $data["s"] ?></td>
                        <td height="25"><?php echo $data["e"] ?></td>

                        <?php
                    }
                    ?>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </td>
    </tr>
</table>
</td>
</tr>
</table>