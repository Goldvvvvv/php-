<?php
require("../conn.php");
if ($action == "Edit") {
    $PassWord = md5($NewPassword);

    $sql = "update admin set PassWord='$PassWord',type='$type' where Id=$id";
    $result = mysql_query($sql);
    echo "<script>alert('�޸ĳɹ�');location.href='Admin_Manage.php'</script>";

}
$sql = "select * from admin where Id=$ID";
$result = mysql_query($sql);
$rs = mysql_fetch_array($result);
?>

<script language="javascript">
    function form_onsubmit() {
        if (document.form_admin.UserName.value == "") {
            alert("�˺Ų���Ϊ�ա�");
            return false;
        }
        if (document.form_admin.Password.value == "") {
            alert("���벻��Ϊ�ա�");
            return false;
        }
        if (document.form_admin.Password.value != document.form_admin.ConPassword.value) {
            alert("�������ȷ�����벻һ�¡�");
            document.form_admin.Password.value = '';
            document.form_admin.ConPassword.value = '';
            document.form_admin.Password.focus();
            return false;
        }
    }
</script>

<?php
include("top.php");
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="top"><br> <strong><br>
            </strong>
            <table width="760" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
                <tr>
                    <td class="back_southidc" height="25"> ����Ա�����޸�</td>
                </tr>
                <tr class="tr_southidc">
                    <FORM name=myform onsubmit="return myform_onsubmit()" action="?action=Edit" method=post>
                        <input type=hidden name=id value=<?php echo $ID ?>>
                        <td>
                            <table width="50%" border="0" align="center" cellpadding="0" cellspacing="1"
                                   class="table_southidc">
                                <tr>
                                    <td height="25" colspan="2" class="back_southidc">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="29%" height="22">
                                        <div align="right">����Ա�ʺţ�</div>
                                    </td>
                                    <td width="71%"><?php echo $rs["UserName"]; ?></td>
                                </tr>

                                <tr>
                                    <td height="22">
                                        <div align="right">�����룺</div>
                                    </td>
                                    <td><input name="NewPassword" type="password" size="16" maxlength="20"></td>
                                </tr>
                                <tr>
                                    <td height="22">
                                        <div align="right">����ȷ�ϣ�</div>
                                    </td>
                                    <td><input name="ConPassword" type="password" size="16" maxlength="20"></td>
                                </tr>

                                <tr>
                                    <td height="22" colspan="2">
                                        <div align="center">
                                            <INPUT type=submit value='ȷ���޸�' name=Submit2>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </form>
                </tr>
            </table>
            <br> <strong> </strong></td>
    </tr>
</table>
