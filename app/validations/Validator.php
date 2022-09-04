<?php 
namespace App\Validations;

class Validator{
    private $data;
    private $errors;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if(array_key_exists($name, $this->data)){
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                           $this->required($name,$this->data[$name]);
                            break;
                        case substr($rule,0,3):
                            $this->min($name,$this->data[$name],$rule);
                            break;
                        default:
                            
                            break;
                    }
                }
            }
        }
        return [];

    }
    private function required(string $name,string $value)
    {
        $value = trim($value);
        if(!isset($value) || is_null($value) || empty($value)){
            $this->errors[$name][] = "{$name} est requis";
        }
    }
    private function min(string $name,string $value,string $rule)
    {
        preg_match_all('/(\d+)/',$rule,$matches);
        dump($matches); die();
    }
}