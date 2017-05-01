<?php

include ('db.php');

function FORM_editCiudad($titulo,$datos,$accion) {
    if (isset($datos['editable']) && $datos['editable']==false)
            $disabled='readonly="readonly"';
    else
        $disabled='';
echo <<< HTML
<div class='frm_ciudad'> <form action=‘$_SERVER[ PHP_SELF ]' method='POST'>
<h3>$titulo</h3>
<input type='hidden' name='id' value='{$datos["id"]}'/>
<div class='frm_ciudad_input'><label for='ciu_nombre'>Nombre:</label>
<input type='text' name='ciu_nombre' value='{$datos["name"]}'' $disabled/></div>
<div class='frm_ciudad_input'> <label for='ciu_comunidad'>Comunidad:</label>
<input type='text' name='ciu_comunidad' value='{$datos["district"]}' $disabled/></div>
<div class='frm_ciudad_input'> <label for='ciu_poblacion'>Población:</label>
<input type='text' name='ciu_poblacion' value='{$datos["population"]}' $disabled/></div>
<div class='frm_ciudad_submit'> <input type='submit' name='accion' value='$accion' />
<input type='submit' name='accion' value='Cancelar' /></div>
</form> </div>
HTML;
}

if (isset($id)) {
    $db=DB_conexion();
    if ($db) {
        switch ($accion) {
            case 'Borrar': 
                $ciudad = DB_getCiudad($db,$id);
                $ciudad['editable']=false;
                FORM_editCiudad('Confirme borrado de esta ciudad:',
                $ciudad,'Confirmar Borrado');
                break;
            case 'BorrarOK':
                if (DB_delCiudad($db,$id))
                    $info[] = 'La ciudad '.$_POST['ciu_nombre'].' ha sido borrada';
                else
                    $info[] = 'No se ha podido borrar '.$_POST['ciu_nombre'];
                break;
        }

    DB_desconexion($db);
?>

