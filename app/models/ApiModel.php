<?php
class ApiModel extends Model {
    
    public function get_news(){
        if($this->db->connect_errno===0){
            $query='select * from news';
            $res = $this->db->query($query);
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
     * @param timestamp $date
     */
    public function add_news($title, $text, $image, $date){
        if($this->db->connect_errno===0){
            $query='INSERT INTO news (title, text, image, date) values ("'.$title.'", "'.$text.'", "'.$image.'", "'.$date.'")';
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
