<?php
session_start();
require "../conn.php";
if ($_SESSION[login_id] != "") {//ȡ��workers�����������޸�
    $sql = "select * from workers where id=$_SESSION[login_id]";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
}
?>
<?php
if ($act == "save") {

    $states = '��';
    $sql = "update workers set birth='$birth',pwd='$pwd',tel='$tel' where id=$_SESSION[login_id]";
    $res = mysql_query($sql);
    if ($res) {
        echo "<script>alert('�޸ĳɹ�');location.href='my.php';</script>";
        exit;
    } else {
        exit ("�޸�ʧ����");
    }
}
require("top.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script language=JavaScript src="js/date.js"></script>

<table width="96%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
    <form name="form1" method="post" action="?act=save&id=<?php echo $id ?>" enctype="multipart/form-data"
          onSubmit="return check()">
        <tr>
            <td height="19" colspan="4" class="title">
                <div align="center" class="title"> �޸�</div>
            </td>
        </tr>

        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ��¼���룺</td>
            <td align="left">
                <input name="pwd" type="text" id="pwd" size="20" value=<?php echo $data[pwd] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ���գ�</td>
            <td align="left">
                <input name="birth" type="text" id="birth" onFocus="show_cele_date(birth,'','',birth)" size="10"
                       value=<?php echo $data[birth] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ��ϵ�绰��</td>
            <td align="left">
                <input name="tel" type="text" id="tel" size="20" value=<?php echo $data[tel] ?>></td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
            <td colspan="2">
                <INPUT TYPE="hidden" name="action" value="yes">
                <input type="Submit" name="Submit" value="�ύ">
                <input type="button" name="Submit2" value="����" onClick="history.back(-1)">
            </td>
        </tr>
    </form>
</table>