<?php


namespace App;


class CSMB extends Board
{
    /**
     * @return string
     */
    public function checkPass()
    {
        $grades = array_filter($this->grades);

        sort($grades, SORT_NUMERIC);
        array_pop($grades);

        return count($grades) > 2 && array_shift($grades) > 8 ? 'Pass' : 'Fail';
    }

    /**
     * @return mixed
     */
    public function export()
    {
        $grades = array_filter($this->grades);
        $average = array_sum($grades)/count($grades);

        $export = [$this->student_id, $this->name, $this->grades, $average, $this->checkPass()];

        // creating object of SimpleXMLElement
        $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');

        // function call to convert array to xml
        $this->array_to_xml($export,$xml_data);

        return $xml_data->asXML();
    }

    /**
     * @param $data
     * @param $xml_data
     */
    private function array_to_xml( $data, &$xml_data ) {
        foreach( $data as $key => $value ) {
            if( is_numeric($key) ){
                switch ($key) {
                    case 0: $key = 'Student ID';break;
                    case 1: $key = 'Student name';break;

                    default:
                        $key = 'item'.$key;
                }
            }
            if( is_array($value) ) {
                $subnode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
}