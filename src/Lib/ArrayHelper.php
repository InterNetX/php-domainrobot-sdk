<?php

namespace IXDomainRobot\Lib;

class ArrayHelper
{

    public static function getValueFromArray($dataArray, $valuePath, $defaultValue)
    {
        $steps = explode(".", $valuePath);

        foreach ($steps as $index => $step) {
            if (empty($dataArray[$step])) {
                return $defaultValue;
            }
            if (!is_array($dataArray[$step]) && ($index) + 1 === count($steps)) {
                return $dataArray[$step];
            }
            if (($index) + 1 === count($steps)) {
                return $dataArray[$step];
            }
            $subValuePath = [];
            for ($i = (int) $index + 1; $i < count($steps); $i++) {
                $subValuePath[] = $steps[$i];
            }

            return self::getValueFromArray($dataArray[$step], implode(".", $subValuePath), $defaultValue);
        }

        return $defaultValue;
    }

    public static function setValueInArray($dataArray, $valuePath, $value)
    {
        $steps = explode(".", $valuePath);

        foreach ($steps as $index => $step) {
            if (preg_match("/\[\]$/", $step)) {
                if (empty($dataArray[str_replace("[]", "", $step)]) || !is_array($dataArray[str_replace("[]", "", $step)])) {
                    $dataArray[str_replace("[]", "", $step)] = [];
                }
                array_push($dataArray[str_replace("[]", "", $step)], $value);
                return $dataArray;
            }

            if (empty($dataArray[$step])) {
                if (count($steps) - 1 == $index) {
                    $dataArray[$step] = $value;
                    return $dataArray;
                }
                $dataArray[$step] = [];
            }
            if (!is_array($dataArray[$step])) {
                $dataArray[$step] = [];
            }

            if (count($steps) - 1 == $index) {
                $dataArray[$step] = $value;
                return $dataArray;
            }


            $subValuePath = [];
            for ($i = (int) $index + 1; $i < count($steps); $i++) {
                $subValuePath[] = $steps[$i];
            }

            $dataArray[$step] = self::setValueInArray($dataArray[$step], implode(".", $subValuePath), $value);
            return $dataArray;
        }

        return $dataArray;
    }
}
