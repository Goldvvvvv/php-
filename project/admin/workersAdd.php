<?php
session_start();
require "../conn.php";
if ($id != "") {//ȡ��workers�����������޸�
    $sql = "select * from workers where id=$id";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
}
?>
<?php
if ($act == "save") {
    if ($id == "") {
        if ($name == "" || $uname == "" || $pwd == "") {
            echo "<script>alert('��Ϣ������');history.back();</script>";
            exit;
        }
        $states = '��';
        $sql = "insert into workers (name,uname,birth,pwd,bumen,tel,sex,zhiwu,xueli,zhicheng,minzu,mianmao,states,gongzi) values ('$name','$uname','$birth','$pwd','$bumen','$tel','$sex','$zhiwu','$xueli','$zhicheng','$minzu','$mianmao','$states','$gongzi')";

        $res = mysql_query($sql);
        if ($res) {
            echo "<script>alert('��ӳɹ�');location.href='workers.php';</script>";
            exit;
        } else {
            exit("���ʧ����");
        }
    }

    $states = '��';
    $sql = "update workers set name='$name',uname='$uname',birth='$birth',pwd='$pwd',bumen='$bumen',tel='$tel',sex='$sex',zhiwu='$zhiwu',xueli='$xueli',zhicheng='$zhicheng',minzu='$minzu',mianmao='$mianmao',states='$states',gongzi='$gongzi' where id=$id";
    $res = mysql_query($sql);
    if ($res) {
        echo "<script>alert('�޸ĳɹ�');location.href='workers.php';</script>";
        exit;
    } else {
        exit ("�޸�ʧ����");
    }
}
require("top.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script language=JavaScript src="./js/date.js"></script>

<table width="96%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
    <form name="form1" method="post" action="?act=save&id=<?php echo $id ?>" enctype="multipart/form-data"
          onSubmit="return check()">
        <tr>
            <td height="19" colspan="4" class="title">
                <div align="center" class="title"> ���/�޸�</div>
            </td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> Ա��������</td>
            <td align="left"><input name="name" type="text" id="name" size="20" value=<?php echo $data[name] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ��¼�ʺţ�</td>
            <td align="left"><input name="uname" type="text" id="uname" size="20" value=<?php echo $data[uname] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ��¼���룺</td>
            <td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?php echo $data[pwd] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ���գ�</td>
            <td align="left"><input name="birth" type="text" id="birth" onFocus="show_cele_date(birth,'','',birth)"
                                    size="10" value=<?php echo $data[birth] ?>></td>
        </tr>

        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ѡ���ţ�</td>
            <td align="left"><select name="bumen" id="bumen">
                    <?php
                    $sql = "select * from bumen order by id DESC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>

                        <option
                            value="<?php echo $rs[id] ?>" <?php if ($rs[id] == $data[bumen]) echo "selected"; ?>><?php echo $rs[name] ?></option>
                        <?php
                    }
                    ?>

                </select></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ��ϵ�绰��</td>
            <td align="left"><input name="tel" type="text" id="tel" size="20" value=<?php echo $data[tel] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> �������ʣ�</td>
            <td align="left"><input name="gongzi" type="text" id="tel" size="20" value=<?php echo $data[gongzi] ?>></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ���ƣ�</td>
            <td align="left"><select name="sex" id="sex">
                    <option value="��">��</option>
                    <option value="Ů">Ů</option>
                </select></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ְ��</td>
            <td align="left"><select name="zhiwu">
                    <?php
                    $sql = "select * from zhiwu order by id DESC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>

                        <option
                            value="<?php echo $rs[id] ?>" <?php if ($rs[id] == $data[zhiwu]) echo "selected"; ?>>
                            <?php echo $rs[name] ?>
                        </option>
                        <?php
                    }
                    ?>

                </select></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ѧ����</td>
            <td align="left"><select name="xueli">
                    <?php
                    $sql = "select * from xueli order by id DESC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>
                        <option
                            value="<?php echo $rs[id] ?>" <?php if ($rs[id] == $data[xueli]) echo "selected"; ?>><?php echo $rs[name] ?></option>
                        <?php
                    }
                    ?>

                </select>
            </td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ְ�ƣ�</td>
            <td align="left"><select name="zhicheng">
                    <?php
                    $sql = "select * from zhicheng order by id DESC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>

                        <option
                            value="<?php echo $rs[id] ?>" <?php if ($rs[id] == $data[zhicheng]) echo "selected"; ?>>
                            <?php echo $rs[name] ?>
                        </option>
                        <?php
                    }
                    ?>

                </select></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ���壺</td>
            <td align="left"><select name="minzu">
                    <?php
                    $sql = "select * from minzhu order by id ASC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>

                        <option
                            value="<?php echo $rs[id] ?>" <?php if ($rs[id] == $data[minzu]) echo "selected"; ?>><?php echo $rs[name] ?></option>
                        <?php
                    }
                    ?>

                </select></td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
            <td align="right"> ������ò��</td>
            <td align="left"><select name="mianmao">
                    <?php
                    $sql = "select * from mianmao order by id DESC";
                    $res = mysql_query($sql);
                    while ($rs = mysql_fetch_array($res)) {
                        ?>

                        <option
                            value="<?php echo $rs[id] ?>"
                            <?php if ($rs[id] == $data[mianmao]) echo "selected"; ?>>
                            <?php echo $rs[name] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
            <td colspan="2">
                <INPUT TYPE="hidden" name="action" value="yes">
                <input type="Submit" name="Submit" value="�ύ">
                <input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
    </FORM>
</table>