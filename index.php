<?php
/**
 *   4 - Função SequenciaCrescente($array)
        Receba como parametro um array de números inteiros
        e responda TRUE or FALSE se é possível obter uma
        sequencia crescente removendo apenas um elemento do array.
*/
    $mts_arrays = [
        "[1, 3, 2, 1] FALSE" => [1, 3, 2, 1],
        "[1, 3, 2] TRUE" =>[1, 3, 2],
        "[1, 2, 1, 2] FALSE" =>[1, 2, 1, 2],
        "[3, 6, 5, 8, 10, 20, 15] FALSE" =>[3, 6, 5, 8, 10, 20, 15],
        "[1, 1, 2, 3, 4, 4] FALSE" =>[1, 1, 2, 3, 4, 4],
        "[1, 4, 10, 4, 2] FALSE" =>[1, 4, 10, 4, 2],
        "[10, 1, 2, 3, 4, 5] TRUE" =>[10, 1, 2, 3, 4, 5],
        "[1, 1, 1, 2, 3] FALSE" =>[1, 1, 1, 2, 3],
        "[0, -2, 5, 6] TRUE" =>[0, -2, 5, 6],
        "[1, 2, 3, 4, 5, 3, 5, 6] FALSE" =>[1, 2, 3, 4, 5, 3, 5, 6],
        "[40, 50, 60, 10, 20, 30] FALSE" =>[40, 50, 60, 10, 20, 30],
        "[1, 1] TRUE" =>[1, 1],
        "[1, 2, 5, 3, 5] TRUE" =>[1, 2, 5, 3, 5],
        "[1, 2, 5, 5, 5] FALSE" =>[1, 2, 5, 5, 5],
        "[10, 1, 2, 3, 4, 5, 6, 1] FALSE" =>[10, 1, 2, 3, 4, 5, 6, 1],
        "[1, 2, 3, 4, 3, 6] TRUE" =>[1, 2, 3, 4, 3, 6],
        "[1, 2, 3, 4, 99, 5, 6] TRUE" =>[1, 2, 3, 4, 99, 5, 6],
        "[123, -17, -5, 1, 2, 3, 12, 43, 45] TRUE" =>[123, -17, -5, 1, 2, 3, 12, 43, 45],
        "[3, 5, 67, 98, 3] TRUE" =>[3, 5, 67, 98, 3],

    ];

    function sequenciaCrescenete($array)
    {
        $i = 0;

        $elementos_removidos = 0;

        while($i < sizeof($array))
        {

            if(sizeof($array) === 1)
                return true;

           if(isset($array[$i+1]))
            {
                if($array[$i] < $array[$i+1])
                {
                    $i++;
                    continue;
                }
                if($elementos_removidos == 1)
                    return false;
                else
                {
                    if(isset($array[$i-1]))
                    {
                        if($array[$i-1] == $array[$i+1] || ($array[$i] == $array[$i+1]))
                            array_splice($array,$i+1,1);

                        else if($array[$i-1] < $array[$i+1])
                            array_splice($array,$i,1);

                        else
                            array_splice($array,$i+1,1);

                        $elementos_removidos++;

                        $i= 0;

                        continue;
                    }
                    

                    array_splice($array,$i,1);
                    $elementos_removidos++;
                    $i=0;
                    continue;
                }
            }
             $i++;
        }
        return true;
    }
    /**
     * Teste Array Individualmente
     * 
     *  if(sequenciaCrescenete([10, 1, 2, 3, 4, 5]))
            echo " --- TRUE";
        else
            echo " --- FALSE";
     * */

    /**
     * Teste de todos os Array da questão
     * */
    
    foreach($mts_arrays as $a)
    {
        echo "Teste das Tarefas esperado: ".array_search($a,$mts_arrays);

        echo "<br> Retorno do Codigo: ";

        if(sequenciaCrescenete($a))
            echo " --- TRUE";
        else
            echo " --- FALSE";

        echo "<hr>";
    }
?>