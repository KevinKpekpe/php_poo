<?php 
namespace App\Models;

use Database\DBConnection;
use PDO;
abstract class Model{
    protected $db;
    protected $table;
    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }
    public function all():array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");

    }
    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?",[$id],true);
    }
    public function create(array $data, ?array $relations=null)
    {
        $firstParenthetis = "";
        $secondParenthetis = "";
        $i= 1;
        foreach ($data as $key => $value) {
            $comma = $i=== count($data)? "": ", ";
            $firstParenthetis .= "{$key}{$comma}";
            $secondParenthetis .= ":{$key}{$comma}";
            $i++;
        }
        return $this->query("INSERT INTO {$this->table} ($firstParenthetis) VALUES ($secondParenthetis)",$data);
    }
    public function update(int $id,array $data,?array $relations = null)
    {
        $sqlRequestPart = "";
        $i = 1;
        foreach($data as $key => $value)
        {
            $comma = $i=== count($data)? " ": ", ";
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }
        $data['id'] = $id;
        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id",$data);
    }
    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?",[$id]);
    }
    public function query(string $sql,array $param = null,bool $single=null)
    {
       $method = is_null($param) ? 'query' : 'prepare';
       if(strpos($sql,'DELETE')===0 OR strpos($sql,'INSERT')===0 OR strpos($sql,'UPDATE')===0){  
        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS,get_class($this),[$this->db]); 
        $stmt->execute($param);
       }
       $fetch = is_null($single) ? 'fetchAll' : 'fetch';

       $stmt = $this->db->getPDO()->$method($sql);
       $stmt->setFetchMode(PDO::FETCH_CLASS,get_class($this),[$this->db]);

       if($method == 'query') {
        return $stmt->$fetch();
       }else{
        $stmt->execute($param);
        return $stmt->$fetch();
       }
    }
   
}