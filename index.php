<?php error_reporting(-1);
//В  массиве  А(N)  максимальные  элементы,  являющиеся  четными  числами, 
//заменить значениями их индексов.      
$A = [1, 7, 4, 9, 8, 23, 17, 22 -6, 7];
$countelem = 2; //количество искомых максимумов

echo("Условие:<br>");
print_r($A);

echo("<br>Результат: <br>");
print_r(remove($A, $countelem));

// функция заменяет наййденыне максимумы номером их позоции. 
function remove($array1, $count){
    $arrrcount = search_maxs($array1, $count);
    for($i = 0; $i < count($arrrcount); $i +=2 ){
        for($n = 0; $n < count($array1); $n++){
            if($array1[$n] == $arrrcount[$i]){
                $array1[$n] = $arrrcount[$i+1];
            }
        }
    }
    return $array1;
}
//----------------------функция поиска counte максимальных четных элементов.
function search_maxs($array, $counte){   //функция ищет элемент, за-null-яет его в массиве и рекурсивно вызывает сама себя для поиска следующего четного максимума
    $arr = $array;
    $result  = $array[0];
    $resultpos = 0;
    $res = array();
    for($n = 0; $n < count($arr); $n++){
        if($arr[$n] % 2 == 0){
            if($arr[$n] > $result){
                $result = $arr[$n];
                $resultpos = $n;
            }
        }
        
    }  
    $res = array_merge($res, [$result, $resultpos]);
    $arrr = array();
    for($n = 0; $n < count($arr); $n++){
        if($arr[$n] == $result){
            $arr[$n] = null;
        }
        $arrr[$n] = $arr[$n];
    }  
    if($counte == 1 ){ //условие выхода из функции
        return $res;
        exit;
    }
    $counte--; // счётчик количества максимумов. 
    return array_merge($res, search_maxs($arrr, $counte)); // функция возвращает массив, состоящи из элементов и их положения в массиве
}
