<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class DynatablesComponent extends Component {

    public function parseSorts($sorts, $validOps, $convArray) {
        $sortsValidated = [];
        if (empty($sorts['sorts'])) {
            return $sortsValidated;
        } else {
            $sorts = $sorts['sorts'];
        }

        foreach ($sorts as $index => $value) {
            if (in_array($index, $validOps)) {
                if ($value == '1') {
                    $sortsValidated[] = $convArray[$index] . ' ASC';
                } else if ($value == '-1') {
                    $sortsValidated[] = $convArray[$index] . ' DESC';
                }
            }
        }
        return $sortsValidated;
    }

    public function parseQueries($queries, $validOps, $convArray, $strings, $date_start, $date_end) {
        $queriesValidated = [];
        if (empty($queries['queries'])) {
            return $queriesValidated;
        } else {
            $queries = $queries['queries'];
        }

        foreach ($queries as $index => $value) {
            if (in_array($index, $validOps)) {
                if (in_array($index, $strings)) {
                    $queriesValidated[] = array($convArray[$index] . ' LIKE' => '%' . h($value) . '%');
                } 
                elseif(in_array($index, $date_start)){
                    if(isset($queries['createdfirst']) && isset($queries['createdlast'])){
                        $queriesValidated[] = array($convArray[$index] . ' >=' =>  h($queries['createdfirst']));
                        $queriesValidated[] = array($convArray[$index] . ' <=' =>  h($queries['createdlast']).' 23:59');
                    }
                    else{
                        $queriesValidated[] = array($convArray[$index] . ' LIKE' => '%' . h($queries['createdfirst']) . '%');
                    }
                }
                elseif(in_array($index, $date_end)){
                    if(isset($queries['createdfirst']) && isset($queries['createdlast'])){
                        $queriesValidated[] = array($convArray[$index] . ' >=' =>  h($queries['createdfirst']));
                        $queriesValidated[] = array($convArray[$index] . ' <=' =>  h($queries['createdlast']).' 23:59');
                    }
                    else{
                        $queriesValidated[] = array($convArray[$index] . ' LIKE' => '%' . h($queries['createdlast']) . '%');
                    }        
                }
                else {
                    $queriesValidated[] = array($convArray[$index] => h($value));
                }
            }
        }
        return $queriesValidated;
    }

    public function setDefaultDynatableRequestValues($data) {
        if (empty($data['page'])) {
            $data['page'] = 1;
        }
        if (empty($data['perPage'])) {
            $data['perPage'] = 10;
        }
        if (empty($data['offset'])) {
            $data['offset'] = 0;
        }
        return $data;
    }

}
