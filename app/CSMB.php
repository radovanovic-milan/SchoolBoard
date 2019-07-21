<?php


namespace App;


class CSMB extends Board
{
    public function checkPass()
    {
        $grades = array_filter($this->grades);

        sort($grades, SORT_NUMERIC);
        array_pop($grades);

        return count($grades) > 2 && array_shift($grades) > 8;
    }

    public function export()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);

        $export = [$this->student_id, $this->name, $this->grades, $average, $this->checkPass()];

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($export, array ($xml, 'addChild'));
        return $xml->asXML();
    }
}