<?php

require_once 'Base.model.php';

class ProcesoModel extends BaseModel{
        function __construct(){

                parent:: __construct('proceso');

                $processNumber = '4545';
                $idClient='4545';
                $status ='homologado';

                $arrayProcess = array(
                        'numero_proceso' => $processNumber,
                        'id_cliente' => $idClient,
                        'estado' => $status
                    );
                return $arrayProcess;
        }

        /*function addProcessColumn($processNumber, $idClient, $status= 'homologado') {
                $arrayProcess = array(
                    'numero_proceso' => $processNumber,
                    'id_cliente' => $idClient,
                    'estado' => $status
                );
        
                return $arrayProcess;
            }*/
}
