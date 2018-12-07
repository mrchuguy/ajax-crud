<?php
class ApiModel extends Model {
    
    public function get_news(){
        if($this->db->connect_errno===0){
            $query='select * from news';
            $res = $this->db->query($query);
	    var_dump($res);
	    exit();
            if($res){
               return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
    /**
     * 
     * @param type $title
     * @param type $text
     * @param type $image
     */
    public function add_news($title, $text, $image){
        if($this->db->connect_errno===0){
            $query='INSERT INTO news (title, text, image) values ("'.$title.'", "'.$text.'", "'.$image.'")';
            $this->db->query($query);
        }
    }
    
    public function delete_news($id){
        if($this->db->connect_errno === 0){
            $query = 'DELETE from students where id='.$id;
            $this->db->query($query);
        }
    }
}
