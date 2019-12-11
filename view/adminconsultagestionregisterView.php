<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
        require_once 'core/ControladorBase.php';

        $entidad = new ControladorBase;
        $entidad->redirect("Login","index");
    } else {
?>
<html>
    <head>
        <?php require_once 'view/module/headers.php';?>
    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php require_once 'view/module/admin/sidemenubar.php'?>
            </div>
            <?php require_once 'view/module/consult/gestion/topTitleConsultGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Consulta","getConsultas") ?>">Lista</a></li>
                </ol>
            </nav>
            <?php
                if(isset($_GET["confirm"]) && $_GET["confirm"] == "not"){
            ?>
            <script>alert("Identificacion ingresada ya pertenece a otro usuario!!")</script>
            <?php
                }
            ?>
            <form class="" name="addUser" method="post" action="<?php echo $helper->url("Consulta","crear");?>">
                <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="identificacion">Id mascota</label>
                            <input type="text" class="form-control" id="id_mascota" name="id_mascota" value="<?php echo $_GET['id'] ?>" placeholder="" onkeypress="return solonumeros(event);" onpaste="return false" required>
                        </div>                    
                        <div class="col-md-2 mb-2">
                            <label for="nombre">Propietario</label>
                            <input type="text" class="form-control" id="identificacion_propietario" name="identificacion_propietario"  value="<?php echo $_GET['cliente'] ?>" placeholder="" required onkeypress="return sololetras(event);">
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="apellido">Vacunacion</label>
                            <select id="vacunacion" name="vacunacion" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="apellido">Desparacitacion</label>
                            <select id="desparacitacion" name="desparacitacion" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="apellido">Problemas previos</label>
                            <select id="problemas_previos" name="problemas_previos" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="apellido">Alergias conocidas</label>
                            <select id="alergias_conocidas" name="alergias_conocidas" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="apellido">Poblacion suceptible</label>
                            <select id="poblacion_suceptible" name="poblacion_suceptible" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="direccion">Otros animales</label>
                            <select id="otros_animales" name="otros_animales" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="direccion">Habitat</label>
                            <select id="habitat" name="habitat" class="browser-default custom-select">
                                <option value="Domestico">Domestico</option> 
                                <option value="Urbano">Urbano</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="direccion">Motivo de la consulta</label>
                            <input type="text" class="form-control" id="motivo_consulta" name="motivo_consulta" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="direccion">Estado reproductivo</label>
                            <select id="estado_reproductivo" name="estado_reproductivo" class="browser-default custom-select">
                                <option value="Normal">Normal</option> 
                                <option value="Monta">Monta</option>
                                <option value="Castrado">Castrado</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Frecuencia a enfermedades</label>
                            <select id="frecuencia_enfermedades" name="frecuencia_enfermedades" class="browser-default custom-select">
                                <option value="Frecuente">Frecuente</option> 
                                <option value="Muy frecuente">Muy frecuente</option>
                                <option value="Poco frecuente">Poco frecuente</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Cirugias anteriores</label>
                            <select id="cirugias_anteriores" name="cirugias_anteriores" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Tratamiento previo</label>
                            <input type="text" class="form-control" id="tratamiento_previo" name="tratamiento_previo" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Condicion corporal</label>
                            <input type="text" class="form-control" id="condicion_corpoal" name="condicion_corporal" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-1 mb-1">
                            <label for="username">Pulso</label>
                            <input type="number" class="form-control" id="pulso" name="pulso" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="username">Frecuencia cardiaca</label>
                            <input type="number" class="form-control" id="frecuencia_cardiaca" name="frecuencia_cardiaca" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="username">Frecuencia respiratoria</label>
                            <input type="number" class="form-control" id="frecuencia_respiratoria" name="frecuencia_respiratoria" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="pass">Temperatura rectal</label>
                            <input type="number" class="form-control" id="temperatura_rectal" name="temperatura_rectal" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="pass">Mucosas</label>
                            <select id="mucosas" name="mucosas" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Estado de mucosas</label>
                            <select id="estado_mucosa" name="estado_mucosa" class="browser-default custom-select">
                                <option value="Estable" >Estable</option> 
                                <option value="Muy alto">Muy alto</option>
                                <option value="Critico">Critico</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Palpitacion Rectal</label>
                            <input type="number" class="form-control" id="palpitacion_rectal" name="palpitacion_rectal" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Condicion corporal</label>
                            <input type="text" class="form-control" id="condicion_corpoal" name="condicion_corporal" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="pass">Deshidratacion</label>
                            <select id="deshidratacion" name="deshidratacion" class="browser-default custom-select">
                                <option value="S">Si</option> 
                                <option value="N">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Detalles de examen fisico</label>
                            <input type="text" class="form-control" id="detallex_examen_fisico" name="detallex_examen_fisico" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="pass">Diagnostico</label>
                            <select id="diagnostico" name="diagnostico" class="browser-default custom-select">
                                <?php foreach($diagnostic as $diag) {?>
                                <option value="<?php echo $diag->id; ?>"><?php echo $diag->nombre_diagnostico?></option> 
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Plan diagnostico</label>
                            <input type="text" class="form-control" id="plan_diagnostico" name="plan_diagnostico" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Plan Terapeutico</label>
                            <input type="text" class="form-control" id="plan_terapeutico" name="plan_terapeutico" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefono">Observaciones</label>
                            <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="" required>
                            <div class="invalid-feedback">
                                Debe llenar este campo.
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="tipo" value="lx">
                <input class="btn btn-primary" type="submit" value="Registrar">
            </form>
        <?php require_once 'view/module/endBody.php'?>
    </body>
</html>

<?php 
    }//fin del sino 
}else{
    require_once 'core/ControladorBase.php';

    $entidad = new ControladorBase;
    $entidad->redirect("Login","index");
}
?>