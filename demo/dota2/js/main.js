function FunctionDota2($real) {
  /* Get the text field */
switch ($real) {
  case 1:
    var copyText = document.getElementById("myInput");
    break;
  case 2:
    var copyText = document.getElementById("myInput2");
    break;
  default:
    var copyText = document.getElementById("myInput3");
}
  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Текст скопирован: " + copyText.value);
}