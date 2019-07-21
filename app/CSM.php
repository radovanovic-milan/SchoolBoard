<?php


namespace App;


class CSM extends Board
{
    public function checkPass()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);
        return $average >= 7;
    }

    public function export()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);

        $export = [$this->student_id, $this->name, $this->grades, $average, $this->checkPass()];
        return json_encode($export);
    }
}