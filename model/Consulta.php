<?php
class Consulta extends EntidadBase{
    private $id, $id_mascota, $id_cliente, $vacunacion, $desparaciatacion, $problemas_previos, $alergias_conocidas, $poblacion_suceptible, $otros_animales, $habitat;
    private $motivo_consulta, $estado_reproductivo, $frecuencia_enfermedades, $cirugias_anteriores, $tratamiento_previo, $condicion_corporal, $pulso, $frecuencia_cardiaca;
    private $frecuencia_respiratoria, $temperatura_rectal, $mucosas, $estado_mucosas, $palpitacion_rectal, $deshidratacion, $detalles_examen_fisico, $id_diagnostico, $plan_diagnostico, $plan_terapeutico, $observaciones;
    private $table;

    public function __construct(){
        $this->table="Consulta";
        parent::__construct($this->table);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdMascota(){
        return $this->id_mascota;
    }

    public function setIdMascota($id_mascota){
        $this->id_mascota = $id_mascota;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function getVacunacion(){
        return $this->vacunacion;
    }

    public function setVacunacion($vacunacion){
        $this->vacunacion = $vacunacion;
    }
    public function getDesparasitacion(){
        return $this->desparaciatacion;
    }

    public function setDesparasitacion($desparaciatacion){
        $this->desparaciatacion = $desparaciatacion;
    }

    public function getProblemasPrevios(){
        return $this->problemas_previos;
    }

    public function setProblemasPrevios($problemas_previos){
        $this->problemas_previos = $problemas_previos;
    }

    public function getAlergiasConocidas(){
        return $this->alergias_conocidas;
    }

    public function setAlergiasConocidas($alergias_conocidas){
        $this->alergias_conocidas = $alergias_conocidas;
    }

    public function getPoblacionSuceptible(){
        return $this->poblacion_suceptible;
    }

    public function setPoblacionSuceptible($poblacion_suceptible){
        $this->poblacion_suceptible = $poblacion_suceptible;
    }
    public function getOtrosAnimales(){
        return $this->otros_animales;
    }

    public function setOtrosAnimales($otros_animales){
        $this->otros_animales = $otros_animales;
    }

    public function getHabitat(){
        return $this->habitat;
    }

    public function setHabitat($habitat){
        $this->habitat = $habitat;
    }

    public function getMotivoConsulta(){
        return $this->motivo_consulta;
    }

    public function setMotivoConsulta($motivo_consulta){
        $this->motivo_consulta = $motivo_consulta;
    }

    public function getEstadoReproductivo(){
        return $this->estado_reproductivo;
    }

    public function setEstadoReproductivo($estado_reproductivo){
        $this->$estado_reproductivo = $estado_reproductivo;
    }
    public function getFrecuenciaEnfermedades(){
        return $this->frecuencia_enfermedades;
    }

    public function setFrecuenciaEnfermedades($frecuencia_enfermedades){
        $this->frecuencia_enfermedades = $frecuencia_enfermedades;
    }

    public function getCirugiasAnteriores(){
        return $this->cirugias_anteriores;
    }

    public function setCirugiasAnteriores($cirugias_anteriores){
        $this->cirugias_anteriores = $cirugias_anteriores;
    }

    public function getTratamientoPrevio(){
        return $this->tratamiento_previo;
    }

    public function setTratamientoPrevio($tratamiento_previo){
        $this->tratamiento_previo = $tratamiento_previo;
    }

    public function getCondicionCorporal(){
        return $this->condicion_corporal;
    }

    public function setCondicionCorporal($condicion_corporal){
        $this->condicion_corporal = $condicion_corporal;
    }
    public function getPulso(){
        return $this->pulso;
    }

    public function setPulso($pulso){
        $this->pulso = $pulso;
    }

    public function getFrecuenciaCardiaca(){
        return $this->frecuencia_cardiaca;
    }

    public function setFrecuenciaCardiaca($frecuencia_cardiaca){
        $this->frecuencia_cardiaca = $frecuencia_cardiaca;
    }

    public function getFrecuenciaRespiratoria(){
        return $this->frecuencia_respiratoria;
    }

    public function setFrecuenciaRespiratoria($frecuencia_respiratoria){
        $this->frecuencia_respiratoria = $frecuencia_respiratoria;
    }

    public function getTemperaturaRectal(){
        return $this->temperatura_rectal;
    }

    public function setTemperaturaRectal($temperatura_rectal){
        $this->temperatura_rectal = $temperatura_rectal;
    }
    public function getMucosa(){
        return $this->mucosas;
    }

    public function setMucosa($mucosas){
        $this->mucosas = $mucosas;
    }

    public function getEstadoMucosa(){
        return $this->estado_mucosas;
    }

    public function setEstadoMucosa($estado_mucosas){
        $this->estado_mucosas = $estado_mucosas;
    }

    public function getPalpitacionRectal(){
        return $this->palpitacion_rectal;
    }

    public function setPalpitacionRectal($palpitacion_rectal){
        $this->palpitacion_rectal = $palpitacion_rectal;
    }

    public function getDeshidratacion(){
        return $this->deshidratacion;
    }

    public function setDeshidratacion($deshidratacion){
        $this->deshidratacion = $deshidratacion;
    }

    public function getDetalleExamenFisico(){
        return $this->detalles_examen_fisico;
    }

    public function setDetalleExamenFisico($detalles_examen_fisico){
        $this->detalles_examen_fisico = $detalles_examen_fisico;
    }
    public function getIdDiagnostico(){
        return $this->id_diagnostico;
    }

    public function setIdDiagnostico($id_diagnostico){
        $this->id_diagnostico = $id_diagnostico;
    }

    public function getPlanDiagnostico(){
        return $this->plan_diagnostico;
    }

    public function setPlanDiagnostico($plan_diagnostico){
        $this->plan_diagnostico = $plan_diagnostico;
    }

    public function getPlanTerapeutico(){
        return $this->plan_terapeutico;
    }

    public function setPlanTerapeutico($plan_terapeuticol){
        $this->plan_terapeutico = $plan_terapeutico;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function setObservaciones($observaciones){
        $observaciones = $observaciones;
    }

    public function save(){
        $query="INSERT INTO $this->table(id_mascota, id_cliente, vacunacion, desparasitacion, poblemas_previos, alergias_conocidas,poblacion_suceptible, otros_animales, habitat, motivo_consulta, estado_reproductivo, frecuencia_enfermedades, cirugias_anteriores, tratamiento_previo, condicion_corporal, pulso, frecuencia_cardiaca, frecuencia_respiratoria, temperatura_rectal, mucosas, estado_mucosas, palpitacion_rectal, deshidratacion, detalles_examen_fisico, id_diagnostico, plan_diagnostico, plan_terapeutico, observaciones  )"
                            . "VALUES ('"
                            . $this->id_mascota."','"
                            . $this->id_cliente."','"
                            . $this->vacunacion."','"
                            . $this->desparaciatacion."','"
                            . $this->problemas_previos."','"
                            . $this->alergias_conocidas."','"
                            . $this->poblacion_suceptible."','"
                            . $this->otros_animales."','"
                            . $this->habitat."','"
                            . $this->motivo_consulta."','"
                            . $this->estado_reproductivo."','"
                            . $this->frecuencia_enfermedades."','"
                            . $this->cirugias_anteriores."','"
                            . $this->tratamiento_previo."','"
                            . $this->condicion_corporal."','"
                            . $this->pulso."','"
                            . $this->frecuencia_cardiaca."','"
                            . $this->frecuencia_respiratoria."','"
                            . $this->temperatura_rectal."','"
                            . $this->mucosas."','"
                            . $this->estado_mucosas."','"
                            . $this->palpitacion_rectal."','"
                            . $this->deshidratacion."','"
                            . $this->detalles_examen_fisico."','"
                            . $this->id_diagnostico."','"
                            . $this->plan_diagnostico."','"
                            . $this->plan_terapeutico."','"
                            . $this->observaciones."'"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }
}
?>