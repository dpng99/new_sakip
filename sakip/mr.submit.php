<form name="form1" method="post" action="index.mr.add.php">
  <table width="100%"  border="0" cellspacing="4" cellpadding="4">
    <tr>
      <td><div align="center"><strong>FORM SUBMIT </strong></div></td>
    </tr>
    <tr>
      <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
              <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
              <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
              <input name="do" type="hidden" id="do" value="submitmr">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Bahwa dengan ini satker kami pada
              <?php 
echo $ganti = str_replace("_", " ", $satkernama1);
   ?>
          menyatakan mengirimkan pelaporan manajemen risiko untuk
          <select name="periode" id="periode">
            <option value="1">Periode Semester 1</option>
            <option value="2">Periode Semester 2</option>
            <option selected>--Pilih---</option>
          </select>
          tahun 2021 </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input type="submit" name="Submit" value="Submit">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Dengan menekan submit data anda akan terkunci dan tidak dapat dilakukan input ataupun delete </div></td>
    </tr>
  </table>
</form>
