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






//        $xml = new \SimpleXMLElement('<root/>');
//        array_walk_recursive($export, array ($xml, 'addChild'));
//        return $xml->asXML();

        // initializing or creating array
        //$data = array('total_stud' => 500);

// creating object of SimpleXMLElement
        $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');

// function call to convert array to xml
        $this->array_to_xml($export,$xml_data);

//saving generated xml file;
        return $xml_data->asXML();









    }

    private function array_to_xml( $data, &$xml_data ) {
        foreach( $data as $key => $value ) {
            if( is_numeric($key) ){
                $key = 'item'.$key; //dealing with <0/>..<n/> issues
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