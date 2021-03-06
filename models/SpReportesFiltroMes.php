<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Command;
use PDO;
use yii\base\Model;

class SpReportesFiltroMes extends Model{	

	  
    public function procedimiento($fechaIni,$fechaFin,$vigencia,$fuerza,$modalidad){
        
        $IN_FECHA_INI= $fechaIni;
        $IN_FECHA_FIN= $fechaFin;
        $IN_MODALIDAD= $modalidad;
        $IN_FUERZA= $fuerza;        
        $IN_VIGENCIA= $vigencia;

    	$rows = Yii::$app->telmovil->createCommand("EXEC SP_REPORTES_FILTRO_MES @IN_FECHA_INI = :IN_FECHA_INI , @IN_FECHA_FIN = :IN_FECHA_FIN, @IN_MODALIDAD = :IN_MODALIDAD, @IN_FUERZA = :IN_FUERZA, @IN_VIGENCIA =:IN_VIGENCIA");

        $rows->bindParam(":IN_FECHA_INI", $IN_FECHA_INI, PDO::PARAM_STR);
        $rows->bindParam(":IN_FECHA_FIN", $IN_FECHA_FIN, PDO::PARAM_STR);
        $rows->bindParam(":IN_MODALIDAD", $IN_MODALIDAD, PDO::PARAM_STR);
        $rows->bindParam(":IN_FUERZA", $IN_FUERZA, PDO::PARAM_STR);
        $rows->bindParam(":IN_VIGENCIA", $IN_VIGENCIA, PDO::PARAM_INT);
    
        $result = $rows->queryAll();

        if(count($result) === 1) {
            $mensaje = $result[0]['Mensaje'];     
            if(strcmp($mensaje, 'NO_DATA') === 0){
                $result = array();
            }
        }

        return $result;
    }

    public function nombreFiltroMes($arrayNombres){

        $arrayRetronar1 = $arrayNombres;
        $arrayRetronar2 = $arrayNombres;

        $cantidad = count($arrayNombres);

        for ($i = 0; $i < $cantidad; $i++){
            $final = $arrayNombres[$i][strlen($arrayNombres[$i])-1];

            if ($final === "1") {
                $arrayRetronar1[$i] = "AMORTIZACIÓN ANTICIPO";
                $arrayRetronar2[$i] = "AUTORIZACIÓN PAGO ".strtoupper(substr($arrayRetronar2[$i],0,(strlen($arrayRetronar2[$i])-2)))." ".substr($arrayRetronar2[$i],strlen($arrayRetronar2[$i])-2, 1);
            } else if ($final === "2") {
                $arrayRetronar1[$i] = "VALOR AUTORIZADO";
            } else if ($final === "3"){
                $arrayRetronar1[$i] = "TOTAL PAGO";
            }           
            
        }

        return array($arrayRetronar1,$arrayRetronar2);

    }
}