function valida(f) {
  var ok = true;
  var msg = "Debe insertar datos validos :\n";
  var num = /^[0-9]{2,3}-? ?[0-9]{6,7}$/;
  var corre = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
  if(f.nombre.value == "")
  {
    msg += "- nombre\n";
    ok = false;
  }
  if(f.correo.value == "" || !f.correo.value.match(corre))
  {
    msg += "- correo\n";
    ok = false;
  }
  if(f.fono.value == "" || !f.fono.value.match(num) )
  {
    msg += "- telefono\n";
    ok = false;
  }
  if(f.asunto.value == "")
  {
    msg += "- asunto\n";
    ok = false;
  }
  if(ok == false)
    alert(msg);
  return ok;
}