<?php


namespace App;


class CSM extends Board
{
    /**
     * @return string
     */
    public function checkPass()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);
        return $average >= 7 ? 'Pass' : 'Fail';
    }

    /**
     * @return false|string
     */
    public function export()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);

        $export = [
            'id' => $this->student_id,
            'name' => $this->name,
            'grades' => $this->grades,
            'average' => $average,
            'pass' => $this->checkPass()
        ];
        return json_encode($export);
    }
}